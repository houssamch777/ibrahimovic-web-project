<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Post;
use App\Rules\ReCaptcha;
use I18N_Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Hassanhelfi\NumberToArabic\NumToArabic;
use Mail;

class PaymentController extends Controller
{
    //
    private $paymentGatewayBaseUrl;
    private $userName;
    private $password;
    private $forceTerminalId;


    public function __construct()
    {
        $this->paymentGatewayBaseUrl = "https://test.satim.dz/payment/rest/";
        $this->userName = env('SATIM_USERNAME'); // Merchant username
        $this->password = env('SATIM_PASSWORD'); // Merchant password
        $this->forceTerminalId = env('SATIM_TERMINAL_ID'); // Assigned terminal ID
    }
    public function create(Request $request)
    {
        // قواعد التحقق
        $validated = $request->validate([
            'amount' => 'required|numeric|min:50',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ], [
            'amount.required' => 'المبلغ مطلوب.',
            'amount.numeric' => 'يجب أن يكون المبلغ رقمًا.',
            'amount.min' => 'الحد الأدنى للمبلغ هو 50.',
            'terms.required' => 'يجب قبول الشروط.',
            'g-recaptcha-response.required' => 'التحقق من الكابتشا مطلوب.',
        ]);
    
        $url = $this->paymentGatewayBaseUrl . "register.do";
        $amount = $validated['amount'] * 100; // تحويل المبلغ إلى الشكل المناسب
        $orderNumber = time() . mt_rand(1000, 9999); // إنشاء رقم طلب فريد
    
        // إعداد JSON Params
        $jsonParams = json_encode([
            'force_terminal_id' => $this->forceTerminalId,
        ]);
    
        $payload = [
            'userName' => $this->userName,
            'password' => $this->password,
            'orderNumber' => $orderNumber,
            'amount' => $amount,
            'currency' => '012', // رمز العملة ISO للدينار الجزائري
            'returnUrl' => route('payment.success'),
            'failUrl' => route('payment.failure'),
            'description' => 'Donation Payment',
            'language' => 'AR',
            'jsonParams' => $jsonParams,
        ];
    
        try {
            // إرسال الطلب إلى واجهة SATIM API
            $response = Http::get($url, $payload);
    
            if ($response->successful()) {
                $data = $response->json();
    
                // حفظ المعاملة في قاعدة البيانات
                Donation::create([
                    'order_number' => $payload['orderNumber'],
                    'amount' => $payload['amount'] / 100, // تحويل المبلغ إلى الدينار الجزائري
                    'currency' => $payload['currency'],
                    'status' => 'pending', // الحالة الافتراضية
                ]);
    
                // إعادة توجيه المستخدم إلى صفحة الدفع
                return redirect($data['formUrl']);
            }
    
            // تسجيل الخطأ إذا فشل الطلب
            \Log::error('خطأ في واجهة الدفع', ['response' => $response->body()]);
    
            // معالجة أخطاء API
            return back()->withErrors(['error' => "فشل طلب الدفع. يرجى المحاولة مرة أخرى لاحقًا."]);
        } catch (\Exception $e) {
            // تسجيل الاستثناء
            \Log::error('استثناء في واجهة الدفع', ['message' => $e->getMessage()]);
    
            // معالجة الأخطاء غير المتوقعة
            return back()->withErrors(['error' => "حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى لاحقًا."]);
        }
    }

    /**
     * معالجة نجاح الدفع.
     */
    public function paymentSuccess(Request $request)
{
    // التحقق من الطلب الوارد
    $validated = $request->validate([
        'orderId' => 'required|string',
    ]);

    $url = $this->paymentGatewayBaseUrl . "confirmOrder.do";

    // إعداد البيانات المرسلة إلى API
    $payload = [
        'userName' => $this->userName,
        'password' => $this->password,
        'orderId' => $validated['orderId'],
        'language' => 'AR', // اللغة المفضلة
    ];

    try {
        // إرسال الطلب إلى API
        $response = Http::get($url, $payload);
        
        if ($response->successful()) {
            $data = $response->json();
            //dd($data);
        /*
        // Simulated static response for testing
        $data = [
            "expiration" => "202104",
            "cardholderName" => "TEST TEST",
            "depositAmount" => 11999,
            "currency" => "012",
            "approvalCode" => "303004",
            "authCode" => 2,
            "params" => [
                "udf5" => "555",
                "respCode_desc" => "Votre paiement a été accepté",
                "udf3" => "333",
                "udf4" => "444",
                "udf1" => "111",
                "respCode" => "00"
            ],
            "actionCode" => 0,
            "actionCodeDescription" => "Votre paiement a été accepté",
            "ErrorCode" => "0",
            "ErrorMessage" => "Success",
            "OrderStatus" => 2,
            "OrderNumber" => "17414069331800",
            "Pan" => "628056**0013",
            "Amount" => 11999,
            "Ip" => "0:0:0:0:0:0:0:1",
            "SvfeResponse" => "00"
        ];

        // Log or debug the response for testing
        
        */
            // التحقق من حالة الطلب
            if (isset($data['OrderStatus']) && $data['OrderStatus'] == 2) {
                // تحديث حالة التبرع في قاعدة البيانات
                $donation = Donation::where('order_number', $data['OrderNumber'])->first();

                if ($donation) {
                    $donation->update([
                        'status' => 'success',
                    ]);

                    // تحويل المبلغ إلى كلمات
                    $number = (float) $donation->amount;
                    $words = NumToArabic::number2Word($number);

                    // جلب بيانات إضافية لعرضها في صفحة النجاح
                    $contact = Contact::first();
                    $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

                    // عرض رسالة النجاح للمستخدم
                    return view('pages.payment.success', [
                        'message' => $data['actionCodeDescription'] ?? 'تمت عملية الدفع بنجاح.',
                        'amount' => $donation->amount ?? 0,
                        'words' => $words,
                        'contact' => $contact,
                        'donation' => $donation,
                        'footerRecentPosts' => $footerRecentPosts,
                        'orderNumber' => $data['OrderNumber'] ?? '',
                    ]);
                }
            }

            // إذا لم تكن حالة الطلب ناجحة
            return redirect()->route('payment.failure')->withErrors([
                'error' => $data['actionCodeDescription'] ?? 'حدث خطأ غير معروف. يرجى المحاولة مرة أخرى.',
            ]);
        }

        // تسجيل الخطأ إذا فشل الطلب
        \Log::error('خطأ في استجابة الدفع', ['response' => $response->body()]);

        return redirect()->route('payment.failure')->withErrors([
            'error' => 'فشل في الاتصال بواجهة الدفع. يرجى المحاولة مرة أخرى لاحقًا.',
        ]);
    } catch (\Exception $e) {
        // تسجيل الاستثناء
        \Log::error('استثناء في معالجة نجاح الدفع', ['message' => $e->getMessage()]);

        // معالجة الأخطاء غير المتوقعة
        return redirect()->route('payment.failure')->withErrors([
            'error' => 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى لاحقًا.',
        ]);
    }
}

    /**
     * معالجة فشل الدفع.
     */
    public function paymentFailure(Request $request)
    {
        // التحقق من الطلب الوارد
        $validated = $request->validate([
            'orderId' => 'required|string',
        ]);
    
        $url = $this->paymentGatewayBaseUrl . "confirmOrder.do";
    
        // إعداد البيانات المرسلة إلى API
        $payload = [
            'userName' => $this->userName,
            'password' => $this->password,
            'orderId' => $validated['orderId'],
            'language' => 'AR', // اللغة المفضلة
        ];
    
        try {
            // إرسال الطلب إلى API
            $response = Http::get($url, $payload);
    
            if ($response->successful()) {
                $data = $response->json();
                /*       
                $data = [
                    "expiration" => "202701",
                    "cardholderName" => "**********",
                    "depositAmount" => 0,
                    "currency" => "012",
                    "authCode" => 2,
                    "params" => [
                        "respCode_desc" => "تم رفض معاملتك يرجى الاتصال بالبنك الذي تتعامل معه. رمز الخطأ: 37",
                        "respCode" => "37"
                    ],
                    "actionCode" => 203,
                    "actionCodeDescription" => "processing.error.203",
                    "ErrorCode" => 3,
                    "ErrorMessage" => "Order is not confirmed due to order’s state",
                    "OrderStatus" => 6,
                    "OrderNumber" => "17421094946227",
                    "Pan" => "628058**6712",
                    "Amount" => 1000000,
                    "Ip" => "105.100.17.189",
                    "SvfeResponse" => "37"
                ];
                */
                // تحديث حالة التبرع في قاعدة البيانات إذا كانت موجودة
                $donation = Donation::where('order_number', $data['OrderNumber'] ?? null)->first();
                if ($donation) {
                    $donation->update([
                        'status' => 'failed',
                    ]);
                }
    
                $orderNumber = $data['OrderNumber'] ?? null;
                $amount = isset($data['Amount']) ? $data['Amount'] / 100 : null;
    
                // التحقق من حالة الطلب
                if (
                    isset($data['params']['respCode'], $data['ErrorCode'], $data['OrderStatus']) &&
                    $data['params']['respCode'] === "00" &&
                    (string) $data['ErrorCode'] === "0" &&
                    $data['OrderStatus'] === 3
                ) {
                    // المعاملة مرفوضة
                    $contact = Contact::first();
                    $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
                    return view('pages.payment.fail', compact('contact', 'footerRecentPosts', 'orderNumber', 'amount'))->withErrors([
                        'error' => "تم رفض معاملتك. يرجى الاتصال بالبنك الذي تتعامل معه.",
                    ]);
                } else {
                    // عرض رسالة الخطأ المناسبة
                    $errorMessage = $data['params']['respCode_desc'] ?? $data['actionCodeDescription'] ?? "خطأ غير معروف.";
                    $contact = Contact::first();
                    $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
    
                    return view('pages.payment.fail', compact('contact', 'footerRecentPosts', 'orderNumber', 'amount'))->withErrors([
                        'error' => $errorMessage,
                    ]);
                }
            }
    
            // تسجيل الخطأ إذا فشل الطلب
            \Log::error('خطأ في استجابة الدفع', ['response' => $response->body()]);
    
            return redirect()->route('payment.failure')->withErrors([
                'error' => 'فشل في الاتصال بواجهة الدفع. يرجى المحاولة مرة أخرى لاحقًا.',
            ]);
        } catch (\Exception $e) {
            // تسجيل الاستثناء
            \Log::error('استثناء في معالجة فشل الدفع', ['message' => $e->getMessage()]);
    
            // معالجة الأخطاء غير المتوقعة
            return redirect()->route('payment.failure')->withErrors([
                'error' => 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى لاحقًا.',
            ]);
        }
    }
    public function sendReceiptEmail(Request $request)
{
    // التحقق من المدخلات
    $validated = $request->validate([
        'email' => 'required|email',
        'orderNumber' => 'required|string',
        'amount' => 'required|numeric',
        'words' => 'required|string',
        'donationDate' => 'required|date',
        'receiptImage' => 'required|string', // يجب أن تكون صورة Base64
    ], [
        'email.required' => 'البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
        'orderNumber.required' => 'رقم الطلب مطلوب.',
        'amount.required' => 'المبلغ مطلوب.',
        'words.required' => 'المبلغ بالكلمات مطلوب.',
        'donationDate.required' => 'تاريخ التبرع مطلوب.',
        'receiptImage.required' => 'صورة الإيصال مطلوبة.',
    ]);

    try {
        $email = $validated['email'];
        $orderNumber = $validated['orderNumber'];
        $amount = $validated['amount'];
        $words = $validated['words'];
        $donationDate = $validated['donationDate'];
        $receiptImage = $validated['receiptImage'];

        // إرسال البريد الإلكتروني
        Mail::send('emails.receipt', compact('orderNumber', 'amount', 'words', 'donationDate'), function ($message) use ($email, $receiptImage) {
            $message->to($email)
                ->subject('إيصال التبرع الخاص بك');

            // إضافة الصورة كملف مرفق
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $receiptImage));
            $message->attachData($imageData, 'receipt.png', [
                'mime' => 'image/png',
            ]);
        });

        return response()->json(['success' => true, 'message' => 'تم إرسال الإيصال بنجاح.']);
    } catch (\Exception $e) {
        // تسجيل الخطأ
        \Log::error('خطأ أثناء إرسال البريد الإلكتروني', ['message' => $e->getMessage()]);

        // إعادة استجابة الخطأ
        return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء إرسال الإيصال. يرجى المحاولة مرة أخرى لاحقًا.'], 500);
    }
}

}

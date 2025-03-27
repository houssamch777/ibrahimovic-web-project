<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Post;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Hassanhelfi\NumberToArabic\NumToArabic;
use Illuminate\Support\Str;
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
    function generateUniqueOrderNumber($length = 10)
{
    // Current timestamp
    $timestamp = now()->format('YmdHis'); // e.g., 20250327123456
    
    // Random alphanumeric characters
    $randomString = strtoupper(Str::random($length - strlen($timestamp)));
    
    // Combine timestamp and random string to ensure uniqueness
    return substr($timestamp . $randomString, 0, $length);
}
    public function create(Request $request)
    {
        // قواعد التحقق
        //dd($request->all());
        $validated = $request->validate([
            'amount' => 'required|numeric|min:50',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);

        $url = $this->paymentGatewayBaseUrl . "register.do";
        $amount = $validated['amount'] * 100; // تحويل المبلغ إلى الشكل المناسب
        // Current timestamp
        $uniqueId = strtoupper(uniqid());
        $length = 10;
        $orderNumber = substr($uniqueId, 0, $length);
        $id = uniqid('donation_');
        // إعداد JSON Params
        $jsonParams = json_encode([
            'force_terminal_id' => $this->forceTerminalId,
            'udf1' => 'Dn' . $orderNumber . 'G', // رقم معرف الحملة
            //'udf2' => 'donation'.$orderNumber.'guest', // معرف الضيف
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
            //dd($response->json());
            if ($response->successful()) {
                $data = $response->json();
                //dd($data,$url, $payload);
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

    // إرسال الطلب إلى API
    $response = $this->sendPaymentRequest($url, $payload);

    if (!$response || !$response->successful()) {
        \Log::error('خطأ في استجابة الدفع', ['response' => $response ? $response->body() : 'No response']);
        return redirect()->route('payment.failure')->withErrors([
            'error' => 'فشل في الاتصال بواجهة الدفع. يرجى المحاولة مرة أخرى لاحقًا.',
        ]);
    }

    $data = $response->json();

    // التحقق من حالة الرد
    $result = $this->getPaymentStatus($data);
    if ($result['status'] === 'failed') {
        return redirect()->route('payment.failure')->withErrors([
            'error' => $result['message'],
        ]);
    }

    // جلب التبرع من قاعدة البيانات
    $donation = Donation::where('order_number', $data['OrderNumber'])->first();
    if (!$donation) {
        return redirect()->route('payment.failure')->withErrors([
            'error' => 'التبرع غير موجود. يرجى التحقق من تفاصيل الطلب.',
        ]);
    }

    // تحديث حالة التبرع في قاعدة البيانات
    $donation->update([
        'status' => $result['status'],
    ]);

    // تحويل المبلغ إلى كلمات
    $number = (float) $donation->amount;
    $words = NumToArabic::number2Word($number);

    // جلب بيانات إضافية لعرضها في صفحة النجاح
    $contact = Contact::first();
    $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

    // إعداد البيانات للعرض
    $dataForView = [
        'message' => $result['message'],
        'amount' => $data['Amount'] / 100,
        'orderId' => $validated['orderId'],
        'approvalCode' => $data['approvalCode'] ?? '',
        'words' => $words,
        'data' => $data,
        'contact' => $contact,
        'donation' => $donation,
        'footerRecentPosts' => $footerRecentPosts,
        'orderNumber' => $data['OrderNumber'] ?? '',
    ];
    //dd($dataForView);
    return view('pages.payment.success', $dataForView);
}

/**
 * إرسال طلب إلى واجهة الدفع.
 */
private function sendPaymentRequest($url, $payload)
{
    try {
        return Http::get($url, $payload);
    } catch (\Exception $e) {
        \Log::error('استثناء أثناء الاتصال بواجهة الدفع', ['message' => $e->getMessage()]);
        return null;
    }
}

/**
 * التحقق من حالة الرد من واجهة الدفع.
 */
private function getPaymentStatus($data)
{
    if ($data['params']['respCode'] === "00" && $data['ErrorCode'] === "0" && $data['OrderStatus'] == "2") {
        return ['status' => 'success', 'message' => $data['params']['respCode_desc'] ?? 'تمت عملية الدفع بنجاح.'];
    } elseif ($data['params']['respCode'] === "00" && $data['ErrorCode'] === "2" && $data['OrderStatus'] == "2") {
        return ['status' => 'already_processed', 'message' => 'عملية الدفع تمت سابقًا. الرجاء عدم إعادة تحميل الصفحة.'];
    } else {
        return ['status' => 'failed', 'message' => $data['actionCodeDescription'] ?? 'حدث خطأ غير معروف. يرجى المحاولة مرة أخرى.'];
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
    
            // تحويل الصورة Base64 إلى PDF
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $receiptImage));
            
            // إنشاء PDF جديد
            $pdf = new \TCPDF();
            $pdf->AddPage();
            
            // حفظ الصورة في ملف مؤقت
            $tempImagePath = tempnam(sys_get_temp_dir(), 'receipt');
            file_put_contents($tempImagePath, $imageData);
            
            // إضافة الصورة إلى PDF
            $pdf->Image($tempImagePath, 15, 25, 180, 0, '', '', '', false, 300, '', false, false, 0);
            
            // حذف الملف المؤقت
            unlink($tempImagePath);
            
            // الحصول على محتوى PDF
            $pdfContent = $pdf->Output('', 'S');
    
            // إرسال البريد الإلكتروني
            Mail::send('emails.receipt', compact('orderNumber', 'amount', 'words', 'donationDate'), function ($message) use ($email, $pdfContent, $orderNumber) {
                $message->to($email)
                    ->subject('إيصال التبرع الخاص بك');
    
                // إضافة PDF كمرفق
                $message->attachData($pdfContent, 'receipt_' . $orderNumber . '.pdf', [
                    'mime' => 'application/pdf',
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

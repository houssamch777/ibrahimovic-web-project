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
        // Validation rules
        $validated = $request->validate([
            'amount' => 'required|numeric|min:50',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);
        $url = $this->paymentGatewayBaseUrl . "register.do";
        $amount = $validated['amount'] * 100;// تحويل المبلغ إلى الشكل المناسب (ضرب في 100)
        $orderNumber = time() . mt_rand(1000, 9999); // Generate a unique order number

        // Prepare JSON Params
        $jsonParams = json_encode([
            'force_terminal_id' => $this->forceTerminalId,
        ]);

        $payload = [
            'userName' => $this->userName,
            'password' => $this->password,
            'orderNumber' => $orderNumber,
            'amount' => $amount,
            'currency' => '012', // ISO code for DZD
            'returnUrl' => route('payment.success'),
            'failUrl' => route('payment.failure'),
            'description' => 'Donation Payment',
            'language' => 'AR',
            'jsonParams' => $jsonParams,
        ];

        // Send the request to SATIM API
        $response = Http::get($url, $payload);

        if ($response->successful()) {
            $data = $response->json();

            // Save the transaction to the database
            Donation::create([
                'order_number' => $payload['orderNumber'],
                'amount' => $payload['amount'] / 100, // Convert back to DZD
                'currency' => $payload['currency'],
                'status' => 'pending', // Default status
            ]);

            // Redirect the user to the payment page
            return redirect($data['formUrl']);
        }

        // Handle API errors
        return back()->withErrors(['error' => "فشل طلب الدفع. يرجى المحاولة مرة أخرى لاحقًا."]);

    }

    /**
     * معالجة نجاح الدفع.
     */
    public function paymentSuccess(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'orderId' => 'required|string',
        ]);
        $url = $this->paymentGatewayBaseUrl . "confirmOrder.do";

        // Prepare the payload
        $payload = [
            'userName' => $this->userName,
            'password' => $this->password,
            'orderId' => $validated['orderId'],
            'language' => 'AR', // Set your preferred language (AR, FR, EN)
        ];
        $response = Http::get($url, $payload);
        $data = $response->json();

        //dd($data);
        /*
        // Simulated static response for testing
        $response = [
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
        //dd($response);
        */


        // Handle payment success logic
        if (isset($data['OrderStatus']) && $data['OrderStatus'] == 2) {
            // Update the donation status in the database
            $donation = Donation::where('order_number', $data['OrderNumber'])->first();
            $number = (float) $donation->amount;

            $words = NumToArabic::number2Word($number);

            //dd($number,$words);
            if ($donation) {
                $donation->update([
                    'status' => 'success',
                ]);
            }

            $contact = Contact::first();
            $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

            // Show success message to the user
            return view('pages.payment.success', [
                'message' => $data['actionCodeDescription'] ?? 'Votre paiement a été accepté',
                'amount' => $donation->amount ?? 0,
                'words' => $words,
                'contact' => $contact,
                'donation' => $donation,
                'footerRecentPosts' => $footerRecentPosts,
                'orderNumber' => $data['OrderNumber'] ?? '',
            ]);
        }

        // If OrderStatus is not 2, treat it as a failure
        return redirect()->route('payment.failure')->withErrors([
            'error' => $data['actionCodeDescription'] ?? 'Erreur inconnue, veuillez réessayer.',
        ]);

    }

    /**
     * معالجة فشل الدفع.
     */
    public function paymentFailure(Request $request)
    {
        // Validate the incoming request

        
        $validated = $request->validate([
            'orderId' => 'required|string',
        ]);
        $url = $this->paymentGatewayBaseUrl . "confirmOrder.do";

        // Prepare the payload
        $payload = [
            'userName' => $this->userName,
            'password' => $this->password,
            'orderId' => $validated['orderId'],
            'language' => 'AR', // Set your preferred language (AR, FR, EN)
        ];

        $response = Http::get($url, $payload);

        // Decode the response
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
        $donation = Donation::where('order_number', $data['OrderNumber'])->first();
        if ($donation) {
            $donation->update([
                'status' => 'failed',
            ]);
        }
        $orderNumber = $data['OrderNumber'] ?? null;
        $amount = $data['Amount']/100 ?? null;
        // Check for "rejected" status
        if (
            isset($data['params']['respCode'], $data['ErrorCode'], $data['OrderStatus']) &&
            $data['params']['respCode'] === "00" &&
            (string) $data['ErrorCode'] === "0" &&
            $data['OrderStatus'] === 3
        ) {
            // Transaction rejected
            $contact = Contact::first();
            $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
            return view('pages.payment.fail', compact('contact', 'footerRecentPosts','orderNumber','amount'))->withErrors([
                'error' => "Your transaction was rejected / تم رفض معاملتك."
            ]);
        } else {
            // Display respCode_desc if available, otherwise actionCodeDescription
            $errorMessage = $data['params']['respCode_desc'] ?? $data['actionCodeDescription'] ?? "Unknown error / خطأ غير معروف.";
            $contact = Contact::first();
            $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
            
            return view('pages.payment.fail', compact('contact', 'footerRecentPosts','orderNumber','amount'))->withErrors([
                'error' => $errorMessage
            ]);
        }

    }
    public function sendReceiptEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'orderNumber' => 'required',
            'amount' => 'required',
            'words' => 'required',
            'donationDate' => 'required',
            'receiptImage' => 'required'
        ]);

        $email = $request->email;
        $orderNumber = $request->orderNumber;
        $amount = $request->amount;
        $words = $request->words;
        $donationDate = $request->donationDate;
        $receiptImage = $request->receiptImage;

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

        return response()->json(['success' => true]);
    }

}

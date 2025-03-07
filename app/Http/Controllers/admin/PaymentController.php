<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Post;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
                $amount =  $validated['amount'] * 100;// تحويل المبلغ إلى الشكل المناسب (ضرب في 100)
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
                'amount' => $payload['amount']/100, // Convert back to DZD
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

        dd($data);
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


                try {
                    // Send the API request using Laravel Http client
                    $response = Http::get($url, $payload);
            
                    // Decode the response
                    $data = $response->json();
            
                    // Check for "rejected" status
                    if (
                        isset($data['respCode'], $data['errorCode'], $data['OrderStatus']) &&
                        $data['respCode'] === "00" &&
                        $data['errorCode'] === "0" &&
                        $data['OrderStatus'] === "3"
                    ) {
                        // Transaction rejected
                        $contact = Contact::first();
                        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
                        return view('pages.payment.fail',compact('contact','footerRecentPosts'))->withErrors([
                            'error' => "Your transaction was rejected / تم رفض معاملتك.",
                        ]);
                    } else {
                        // Display respCode_desc if available, otherwise actionCodeDescription
                        $errorMessage = $data['respCode_desc'] ?? $data['actionCodeDescription'] ?? "Unknown error / خطأ غير معروف.";
                        $contact = Contact::first();
                        return view('pages.payment.fail',compact('contact','footerRecentPosts   '))->withErrors(['error' => $errorMessage]);

                    }
                } catch (\Exception $e) {
                    // Handle exceptions
                    $contact = Contact::first();
                    return back()->withErrors(['error' => 'Une erreur s\'est produite. Veuillez réessayer plus tard.']);
                }
    }
}

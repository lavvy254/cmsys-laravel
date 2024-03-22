<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;
use App\Models\Giving;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages.mpesa');
    }
    public function initiatePayment(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'phone' => 'required|string',
            'type' => 'required|string', // Assuming 'type' corresponds to the transaction type
        ]);

        // Initialize the M-PESA SDK
        $mpesa = new \Safaricom\Mpesa\Mpesa();

        // Get configuration values from environment variables
        $BusinessShortCode = config('app.SAFARICOM_SHORTCODE');
        $LipaNaMpesaPasskey = config('app.SAFARICOM_PASSKEY');
        $TransactionType = 'CustomerPayBillOnline'; // Transaction type for STK push
        $Amount = $validatedData['amount'];
        $PartyA = $validatedData['phone']; // Assuming the user's phone number
        $PartyB = $BusinessShortCode; // Your shortcode
        $PhoneNumber = $validatedData['phone']; // Assuming the user's phone number
        $CallBackURL = config('app.MPESA_CALLBACK_URL');
        $AccountReference = 'Laravel Mpesa';
        $TransactionDesc = 'Laravel Mpesa STK PUSH';
        $Remarks = 'Laravel Mpesa STK PUSH';

        // Initiate the STK push simulation
        $stkPushSimulation = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );

        // Handle the response from the SDK
        if ($stkPushSimulation['ResponseCode'] == '0') {
            // Success
            // Save transaction details to the database
            // You can save $stkPushSimulation['CheckoutRequestID'], $stkPushSimulation['MerchantRequestID'], etc.
            // For example:
            Giving::create([
                'checkout_id' => $stkPushSimulation['CheckoutRequestID'],
                'transaction_code' => $stkPushSimulation['MerchantRequestID'],
                'merchant_id' => $BusinessShortCode,
                'amount' => $Amount,
                'phone' => $PhoneNumber,
                'type' => $validatedData['type'],
            ]);

            // Redirect or return a success response
            return redirect()->back()->with('success', 'Payment initiated successfully!');
        } else {
            // Failure
            // Handle the error response
            return redirect()->back()->with('error', 'Failed to initiate payment. Please try again later.');
        }
    }
    public function handleCallback(Request $request)
    {
        // Retrieve the callback data from the request
        $callbackData = $request->all();

        // Extract relevant information from the callback data
        $transactionID = $callbackData['TransactionID'];
        $checkoutRequestID = $callbackData['CheckoutRequestID'];
        $resultCode = $callbackData['ResultCode'];
        $resultDesc = $callbackData['ResultDesc'];

        // Update the transaction status in your database based on the callback data
        $transaction = Giving::where('checkout_id', $checkoutRequestID)->first();
        if ($transaction) {
            // Update the transaction status based on the resultCode
            // For example, you might map certain resultCode values to transaction statuses
            // Update other relevant fields as needed
            if ($resultCode == '0') {
                // Transaction successful
                $transaction->status = 'success';
            } else {
                // Transaction failed
                $transaction->status = 'failed';
                // You might log or handle the failure reason (resultDesc) accordingly
                Log::error("Payment failed for TransactionID: $transactionID. Error: $resultDesc");
            }
            $transaction->save();
        } else {
            // Transaction not found in the database
            // Log or handle this case as needed
            Log::error("Transaction with CheckoutRequestID $checkoutRequestID not found in the database.");
        }

        // Return a response (usually an empty HTTP 200 response)
        return response()->json(['status' => 'success']);
    }

}
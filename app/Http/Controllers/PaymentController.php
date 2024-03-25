<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Giving;



class PaymentController extends Controller
{
    private function getAccessToken()
    {
        $consumerKey = "mn23aN2VwoGkVsk3b1IpQwGc0nLhFGLmoe6jGlfTd1RvMjmH";
        $consumerSecret = "7Qu8bjUOkeMhawWgD5gMTWxWq8G8MsIyfuv6wBmiGO9zNGaSuczFEIGDujsNjqdy";
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($access_token_url);
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_USERPWD => $consumerKey . ':' . $consumerSecret
        ]);

        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $result = json_decode($result);

        if (!isset ($result->access_token)) {
            return null;
        }

        return $result->access_token;
    }

    public function index()
    {
        return view('pages.mpesa');
    }

    public function initiatePayment(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'phone' => 'required|string|max:255',
            'type' => 'required|in:offering,tithe'

        ]);
        $access_token = $this->getAccessToken();
        if (!$access_token) {
            return "Error: Unable to obtain access token";
        }

        $processRequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $callbackUrl = 'https://f531-102-217-157-219.ngrok-free.app/mpesa/callback';
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $businessShortCode = '174379';
        $timestamp = date('YmdHis');
        $phone = $validatedData['phone'];
        $money = $validatedData['amount'];
        $partyA = $phone;
        $partyB = $businessShortCode;
        $accountReference = 'Lavvy Church';
        $transactionDesc = 'Lavvy Church';
        $amount = $money;
        $stkPushHeader = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_URL => $processRequestUrl,
            CURLOPT_HTTPHEADER => $stkPushHeader,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode([
                'BusinessShortCode' => $businessShortCode,
                'Password' => base64_encode($businessShortCode . $passkey . $timestamp),
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $partyA,
                'PartyB' => $partyB,
                'PhoneNumber' => $partyA,
                'CallBackURL' => $callbackUrl,
                'AccountReference' => $accountReference,
                'TransactionDesc' => $transactionDesc
            ])
        ]);

        $curlResponse = curl_exec($curl);
        if ($curlResponse === false) {
            $error = curl_error($curl);
            curl_close($curl);
            return "cURL Error: " . $error;
        }

        curl_close($curl);

        $data = json_decode($curlResponse);
        if (isset ($data->ResponseCode) && $data->ResponseCode == "0") {
            $checkoutRequestID = $data->CheckoutRequestID;
            return redirect()->route('mpesa.index')->with('success', 'Payments is processing....');
        } else {
            return redirect()->route('mpesa.index')->with('error', 'Failed' . $data->errorMessage);
        }
    }
    public function mpesacallback(Request $request)
    {
        $content = json_decode($request->getContent());

        // Log the callback data
        Log::info('M-Pesa Callback Data: ' . json_encode($content));

        $content = json_decode($request->getContent());
        if (isset ($content->Body->stkCallback->ResultCode) && $content->Body->stkCallback->ResultCode == 0) {
            // Payment successful, extract relevant data
            $phone = $content->Body->stkCallback->CallbackMetadata->Item[4]->Value;
            $amount = $content->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $transactionCode = $content->Body->stkCallback->CallbackMetadata->Item[1]->Value;

            // Insert payment details into the database
            $giving = new Giving();
            $giving->phone = $phone;
            $giving->amount = $amount;
            $giving->transaction_code = $transactionCode;
            $giving->merchant_id = $content->Body->stkCallback->MerchantRequestID; // Assuming this is your MerchantID
            $giving->save();

            // Redirect the user back with success message
            return redirect()->route('mpesa.index')->with('success', 'Payment successful!');
        } else {
            // Payment failed, handle error
            return redirect()->route('mpesa.index')->with('error', 'Payment failed. Error: ' . $content->Body->stkCallback->ResultDesc);
        }
    }


}

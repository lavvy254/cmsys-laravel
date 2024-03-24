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

        }
}
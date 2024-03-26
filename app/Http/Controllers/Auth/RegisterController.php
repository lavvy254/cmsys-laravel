<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'], // add regex for phone
            'DOB' => ['required']
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'DOB' => $data['DOB'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        // Send welcome SMS to the user
        $this->sendWelcomeSMS($user);

        return redirect($this->redirectPath());
    }

    private function sendWelcomeSMS($user)
    {
        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');

        $AT = new AfricasTalking($username, $apiKey);

        // Initialize a service
        $sms = $AT->sms();

        // Compose the message
        $message = "Hello {$user->fname}, welcome to our platform!";

        // Send the message
        $result = $sms->send([
            'to' => $user->phone,
            'message' => $message
        ]);

        // Handle errors
        if ($result['status'] !== 'success') {
            // Log or handle error
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $members = User::paginate(7);

        // Calculate age for each user
        foreach ($members as $member) {
            $member->age = Carbon::parse($member->DOB)->age;
        }

        // Return view with users including their ages
        return view('users.index', compact('members'));
    }
    public function create()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'DOB' => 'required|date',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users,phone',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|max:255',
        ]);
    
        // Create the user
        $user = User::create($request->all());
    
        // Send SMS to the user
        $this->sendWelcomeSMS($user);
    
        return redirect()->route('user.index')->with('success', 'New User added Successfully');
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
            Log::error("Failed to send SMS to {$user->phone}. Error: {$result['message']}");
        }
    }
    public function edit(User $user)
    {
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        return view('users.edit', compact('user'));
    }
    public function update(User $users, Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $users->update($request->all());

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('user.index')->with('error', 'Admin users cannot be deleted.');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
    public function getGenderAndAgesData()
    {
        // Retrieve users from the database
        $users = User::all();
    
        // Initialize variables to store total age and count for males and females
        $maleTotalAge = 0;
        $maleCount = 0;
        $femaleTotalAge = 0;
        $femaleCount = 0;
    
        // Calculate total ages and counts for males and females
        foreach ($users as $user) {
            // Calculate age from DOB
            $dob = new \DateTime($user->DOB);
            $now = new \DateTime();
            $age = $now->diff($dob)->y;
    
            // Increment total age and count based on gender
            if ($user->gender == 'Male') {
                $maleTotalAge += $age;
                $maleCount++;
            } elseif ($user->gender == 'Female') {
                $femaleTotalAge += $age;
                $femaleCount++;
            }
        }
    
        // Calculate average ages for males and females
        $maleAverageAge = $maleCount > 0 ? $maleTotalAge / $maleCount : 0;
        $femaleAverageAge = $femaleCount > 0 ? $femaleTotalAge / $femaleCount : 0;
    
        // Return data as JSON
        return response()->json([
            'maleAverageAge' => $maleAverageAge,
            'femaleAverageAge' => $femaleAverageAge
        ]);
    }
    

}

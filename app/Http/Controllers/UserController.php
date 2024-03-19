<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'New User added Successfully');
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
    try {
        // Retrieve only required columns (gender and DOB) from the database
        $users = User::select('gender', 'DOB')->get();

        // Initialize arrays to store genders and ages
        $femaleAges = [];
        $maleAges = [];

        // Calculate ages from DOB and store ages in respective arrays based on gender
        foreach ($users as $user) {
            if ($user->DOB) {
                $dob = new \DateTime($user->DOB);
                $now = new \DateTime();
                $age = $now->diff($dob)->y;
                if ($user->gender === 'female') {
                    $femaleAges[] = $age;
                } elseif ($user->gender === 'male') {
                    $maleAges[] = $age;
                }
            }
        }

        // Calculate average ages for females and males
        $averageFemaleAge = count($femaleAges) > 0 ? array_sum($femaleAges) / count($femaleAges) : 0;
        $averageMaleAge = count($maleAges) > 0 ? array_sum($maleAges) / count($maleAges) : 0;

        // Return data as JSON
        return response()->json(['female_average_age' => $averageFemaleAge, 'male_average_age' => $averageMaleAge]);
    } catch (\Exception $e) {
        // Handle any exceptions and return an error response
        return response()->json(['error' => 'An error occurred while fetching data.'], 500);
    }
}


}

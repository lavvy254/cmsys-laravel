<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth()->user()->roles;

            if ($usertype == 'user') {
                $events = Events::paginate(5);
                return view('pages.members.dashboard', compact('events'));
            } else if ($usertype == 'admin') {
                $members = User::all();

                // Calculate age for each user
                foreach ($members as $member) {
                    $member->age = Carbon::parse($member->DOB)->age;
                }
                return view('dashboard',compact('members'));
            }
        }

        // Fallback behavior if the user is not authenticated or has an unknown role
        return redirect()->view('welcome');
    }
    

}

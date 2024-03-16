<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
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
                return view('dashboard');
            }
        }

        // Fallback behavior if the user is not authenticated or has an unknown role
        return redirect()->view('welcome');
    }

}

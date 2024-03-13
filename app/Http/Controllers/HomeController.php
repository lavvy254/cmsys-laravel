<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (Auth::id()) {
            $usertype = Auth()->user()->roles;

            if ($usertype == 'user') {
                return view('pages.members.dashboard');
            } else if ($usertype == 'admin') {
                return view('dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
}

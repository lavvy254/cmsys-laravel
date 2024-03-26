<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use App\Models\Giving;
use App\Models\Announcements;
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
        if (!Auth::check()) {
            return redirect()->route('welcome');
        }

        $user = Auth::user();

        if ($user->roles === 'user') {
            $endDate = now()->addWeeks(3);
            $announcements = Announcements::paginate(5);
            $upcomingEvents = Events::whereDate('start_date', '>=', now())
                ->whereDate('start_date', '<=', $endDate)
                ->orderBy('start_date')
                ->get();
            return view('pages.members.dashboard', compact('upcomingEvents','announcements'));
        } elseif ($user->roles === 'admin') {
            $endDate = now()->addWeeks(3);
            $upcomingEvents = Events::whereDate('start_date', '>=', now())
                ->whereDate('start_date', '<=', $endDate)
                ->orderBy('start_date')
                ->get();
            $members = User::all()->each(function ($member) {
                $member->age = Carbon::parse($member->DOB)->age;
            });

            $totalUsers = $members->count();
            $currentYear = Carbon::now()->year;
            $totalAmountYear = Giving::whereYear('created_at', $currentYear)->sum('amount');
            $totalGiving = Giving::sum('amount');

            return view('dashboard', compact('members', 'totalUsers', 'totalGiving', 'totalAmountYear', 'upcomingEvents'));
        }

        return redirect()->route('welcome');
    }
}

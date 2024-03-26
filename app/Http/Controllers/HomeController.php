<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use App\Models\Giving;
use App\Models\Announcements;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
            $user = Auth::user();

            $endDate = now()->addWeeks(3);
            $announcements = Announcements::paginate(5);
            $upcomingEvents = Events::whereDate('start_date', '>=', now())
                ->whereDate('start_date', '<=', $endDate)
                ->orderBy('start_date')
                ->get();
            return view('pages.members.dashboard', compact('upcomingEvents', 'announcements'));
        } elseif ($user->roles === 'admin') {
            $users = Giving::select('user_id', DB::raw('SUM(amount) as total_contributions'))
                ->groupBy('user_id')
                ->orderByDesc('total_contributions')
                ->take(5)
                ->get();

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

            return view('dashboard', compact('members', 'totalUsers', 'totalGiving', 'totalAmountYear', 'upcomingEvents', 'users'));
        }

        return redirect()->route('welcome');
    }
}

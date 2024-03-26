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
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('welcome');
        }

        if ($user->roles === 'user') {
            $endDate = now()->addWeeks(3);
            $announcements = Announcements::paginate(5);
            $upcomingEvents = Events::whereBetween('start_date', [now(), $endDate])
                ->orderBy('start_date')
                ->get();
            return view('pages.members.dashboard', compact('upcomingEvents', 'announcements'));
        } elseif ($user->roles === 'admin') {
            $endDate = now()->addWeeks(3);
            $upcomingEvents = Events::whereBetween('start_date', [now(), $endDate])
                ->orderBy('start_date')
                ->get();

            $users = Giving::select('user_id', DB::raw('SUM(amount) as total_contributions'))
                ->groupBy('user_id')
                ->orderByDesc('total_contributions')
                ->take(5)
                ->get();

            $members = User::all()->map(function ($member) {
                $member->age = Carbon::parse($member->DOB)->age;
                return $member;
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

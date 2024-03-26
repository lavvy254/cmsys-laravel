<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giving;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class GivingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'admin') {
            $givings = Giving::paginate(5);
            return view('pages.admin.giving.give', compact('givings'));
        } else {
            $user = Auth::user();

            // Check if the user is authenticated
            if ($user) {
                // Retrieve data for the authenticated user

                $givings = Giving::join('users', 'giving.user_id', '=', 'users.id')
                    ->where('users.email', $user->email)
                    ->paginate(5);
                return view('pages.members.giving.give', compact('givings'));
            }

        }

    }
    public function create()
    {
        $members = User::all();
        $givings = Giving::all();
        return view('pages.admin.giving.create', compact('members', 'givings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'transaction' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'amount' => 'required|integer|max:11',
        ]);
        Giving::create($request->all());
        return redirect()->route('giving.index')->with('Success', 'You Have added New Contribution');

    }
    public function getYearlyGivingData()
    {
        // Query total amount received per year from the giving table
        $givingData = DB::table('giving')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(amount) as total_amount'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        // Return data as JSON
        return response()->json($givingData);
    }
    public function getTypeWiseGivingData()
    {
        // Query total amount received per type from the giving table
        $givingData = DB::table('giving')
            ->select('type', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('type')
            ->get();

        // Return data as JSON
        return response()->json($givingData);
    }


}

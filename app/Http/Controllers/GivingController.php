<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giving;
use App\Models\User;

class GivingController extends Controller
{
    public function index()
    {
        $givings = Giving::paginate(5);
        return view('pages.giving.give',compact('givings'));
    }
    public function create()
    {
        $members = User::all();
        $givings = Giving::all();
        return view('pages.giving.create',compact('members','givings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required|exists:users,id',
            'transaction' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'amount' => 'required|integer|max:11',
        ]);
        Giving::create($request->all());
        return redirect()->route('giving.index')->with('Success','You Have added New Contribution');
        
    }
}

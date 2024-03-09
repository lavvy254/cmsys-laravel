<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerRequests;
use App\Models\Prayer;
use App\Models\User;

class Prayer_requestController extends Controller
{
    public function edit(PrayerRequests $prayer_request)
    {
        
        $users = User::all();
        $prayers = Prayer::all();
        return view('pages.prayer.prayer_request.edit',compact('prayer_request','users','prayers'));
    }
    public function update(PrayerRequests $prayer_request, Request $request)
    {
        $request->validate([
            'prayer_id' => 'required|exists:prayer,id',
            'user_id' => 'required|exists:users,id', 
            'status' => 'required|string|max:255',
        ]);
        $prayer_request->update($request->all());

        return redirect()->route('pages.tables')->with('success', 'Prayer_Requests updated successfully.');
    }
}

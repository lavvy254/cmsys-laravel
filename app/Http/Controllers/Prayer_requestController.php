<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerRequests;
use App\Models\Prayer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Prayer_requestController extends Controller
{
    public function edit(PrayerRequests $prayer_request)
    {

        $users = User::all();
        $prayers = Prayer::all();
        return view('pages.prayer.prayer_request.edit', compact('prayer_request', 'users', 'prayers'));
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
    public function create()
    {
        $prayers = Prayer::all();
        return view('pages.members.prayers.add',compact('prayers'));
    }
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'prayer_id' => 'required|exists:prayers,id',
    ]);

    // Get the currently authenticated user
    $user = Auth::user();

    // Check if the user is authenticated
    if ($user) {
        // Create a new PrayerRequest instance
        $prayerRequest = new PrayerRequests();
        $prayerRequest->user_id = $user->id;
        $prayerRequest->prayer_id = $request->input('prayer_id');
        $prayerRequest->save();

        return redirect()->route('prayers.index')->with('success', 'New Request added Successfully');
    } else {
        // User is not authenticated, handle the case accordingly
        return redirect()->route('login');
    }
}

}

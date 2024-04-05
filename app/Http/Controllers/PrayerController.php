<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Prayer;
use App\Models\PrayerRequests;
use Illuminate\Support\Facades\Auth;

class PrayerController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            // Retrieve data for the authenticated user
            $prayers = Prayer::paginate(5);
            $prayerrequests = PrayerRequests::join('users', 'prayer_requests.user_id', '=', 'users.id')
                ->where('users.email', $user->email)
                ->paginate(5);
            return view('pages.members.prayers.prayer', compact('prayers', 'prayerrequests'));
        } else {
            // User is not authenticated, handle the case accordingly
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('pages.admin.prayer.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500'
        ]);


        Prayer::create($request->all());
        return redirect()->route('pages.tables')->with('success', 'New Prayer added Successfully');
    }
    public function edit(Prayer $prayer)

    {
        if (!$prayer) {
            return redirect()->route('pages.tables')->with('error', 'Prayer  not found');
        }
        return view('pages.prayer.edit', compact('prayer'));
    }
    public function update(Prayer $prayer, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        $prayer->update($request->all());

        return redirect()->route('pages.tables')->with('success', 'Prayer updated successfully.');
    }
    public function destroy(Prayer $prayer)
    {
        try {
            $prayer->delete();
            return redirect()->route('pages.tables')->with('success', 'Prayer Removed successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this prayer because it is referenced by one or more prayer requests.';
            } else {
                $errorMessage = 'An error occurred while deleting the prayer.';
            }
            return redirect()->route('pages.tables')->with('error', $errorMessage);
        }
    }
}

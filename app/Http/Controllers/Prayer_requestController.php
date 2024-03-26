<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerRequests;
use App\Models\Prayer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\PrayerAnswered;
use AfricasTalking\SDK\AfricasTalking;

class Prayer_requestController extends Controller
{
    public function edit(PrayerRequests $prayer_request)
    {
        $users = User::all();
        $prayers = Prayer::all();
        return view('pages.admin.prayer.prayer_request.edit', compact('prayer_request', 'users', 'prayers'));
    }

    public function update(PrayerRequests $prayer_request, Request $request)
    {
        $request->validate([
            'prayer_id' => 'required|exists:prayers,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string|max:255',
        ]);

        $oldStatus = $prayer_request->status;
        $prayer_request->update($request->all());

        // Check if the status has been updated to "answered"
        if ($oldStatus !== 'answered' && $prayer_request->status === 'answered') {
            // Trigger the event to send an SMS
            event(new PrayerAnswered($prayer_request->user));
        }

        return redirect()->route('pages.tables')->with('success', 'Prayer_Requests updated successfully.');
    }

    public function create()
    {
        $prayers = Prayer::all();
        return view('pages.members.prayers.add', compact('prayers'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'prayer_id' => 'required|exists:prayers,id',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        if ($user) {
            // Create a new prayer request
            $prayerRequest = new PrayerRequests();
            $prayerRequest->user_id = $user->id;
            $prayerRequest->prayer_id = $request->input('prayer_id');
            $prayerRequest->save();

            // Send SMS notification to the user
            $this->sendPrayerRequestReceivedNotification($user);

            return redirect()->route('prayers.index')->with('success', 'New Request added Successfully');
        } else {
            return redirect()->route('login');
        }
    }

    private function sendPrayerRequestReceivedNotification($user)
    {
        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');

        $AT = new AfricasTalking($username, $apiKey);

        // Initialize a service
        $sms = $AT->sms();

        // Compose the message
        $message = "Dear {$user->fname}, your prayer request has been received successfully.";

        // Send the message
        $result = $sms->send([
            'to' => $user->phone,
            'message' => $message
        ]);

        // Handle errors
        if ($result['status'] !== 'success') {
            // Log or handle error
        }
    }
}

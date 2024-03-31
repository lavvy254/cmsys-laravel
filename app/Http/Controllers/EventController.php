<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Attendance;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
    
        $events = Events::paginate(4);
        return view('pages.members.events.event', ['events' => $events]);
    }
    public function adminindex()
    {
    
        $events = Events::paginate(4);
        return view('pages.admin.events.index', ['events' => $events]);
    }
    
    public function attend(Events $event)
{
    // Check if the event has started
    if ($event->start_date > now()) {
        return redirect()->back()->with('error', 'Event has not yet started.');
    }

    if ($event->end_date <= now()) {
        return redirect()->back()->with('error', 'Event has already ended.');
    }

    $user = auth()->user();
    if ($user->eventsAttended->contains($event)) {
        return redirect()->back()->with('error', 'You are already registered for this event.');
    }

    $attendance = new Attendance();
    $attendance->event_id = $event->id;
    $attendance->user_id = $user->id;
    $attendance->save();

    return redirect()->back()->with('success', 'Attendance registered successfully.');
}

    
}
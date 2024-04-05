<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Attendance;
use Illuminate\Database\QueryException;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {

        $events = Events::paginate(4);
        return view('pages.members.events.event', ['events' => $events]);
    }
    public function create(Events $event)
    {
        return view('pages.admin.events.add', compact('event'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ename' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date|max:255',
            'end_date' => 'required|date|max:255',
        ]);
        Events::create($request->all());
        return redirect()->route('events.view')->with('success', 'Event added Successfully');
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
    public function destroy(Events $event)
    {
        try {
            $event->delete();
            return redirect()->route('events.view')->with('success', 'Event Removed successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Event because it is referenced by one or more Tables.';
            } else {
                $errorMessage = 'An error occurred while deleting the Event.';
            }
            return redirect()->route('events.view')->with('error', $errorMessage);
        }
    }
}

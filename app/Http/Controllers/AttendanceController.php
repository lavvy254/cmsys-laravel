<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Events;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::paginate(5);
        return view('pages.attendance.view', compact('attendance'));
    }
    public function create(Attendance $attendance)
    {
        $users = User::all();
        $events = Events::all();
        return view('pages.attendance.add', compact('attendance','events','users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',

        ]);
        Attendance::create($request->all());
        return redirect()->route('attendance.view')->with('success', 'Attendance added Successfully');
    }
    public function edit(Attendance $attendance)
    {
        return view('pages.attendance.edit', compact('attendance'));
    }
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $attendance->update($request->all());
        return redirect()->route('attendance.view')->with('success', 'Attendance added Successfully');
    }
}

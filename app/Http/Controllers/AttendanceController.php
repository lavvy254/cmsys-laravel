<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return view('pages.attendance.add', compact('attendance', 'events', 'users'));
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
    public function getYearlyAttendanceData()
    {
        // Query attendance data from the database, grouping by year of event start date
        $attendanceData = DB::table('attendance')
            ->join('events', 'attendance.event_id', '=', 'events.id')
            ->join('users', 'attendance.user_id', '=', 'users.id')
            ->select(DB::raw('YEAR(events.start_date) as year'), DB::raw('COUNT(*) as attendance_count'))
            ->groupBy(DB::raw('YEAR(events.start_date)'))
            ->get();

        // Return data as JSON
        return response()->json($attendanceData);
    }

}

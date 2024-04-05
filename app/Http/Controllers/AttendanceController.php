<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Database\QueryException;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::paginate(5);
        return view('pages.admin.attendance.view', compact('attendance'));
    }
    public function create(Attendance $attendance)
    {
        $users = User::all();
        $events = Events::all();
        return view('pages.admin.attendance.add', compact('attendance', 'events', 'users'));
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
        return view('pages.admin.attendance.edit', compact('attendance'));
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
    public function destroy(Attendance $attendance)
    {
        try {
            $attendance->delete();
            return redirect()->route('attendance.view')->with('success', 'Deleted Successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Attendance because it is referenced by one or more Attendance.';
            } else {
                $errorMessage = 'An error occurred while deleting the Attendance.';
            }
            return redirect()->route('attendance.view')->with('error', $errorMessage);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Announcements;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcements::paginate(5);
        return view('pages.admin.Announcements.announcement', compact('announcements'));
    }
    public function create(Announcements $announcement)
    {
        return view('pages.admin.announcements.add', compact('announcement'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|alpha|max:255',
            'message' => 'required|alpha|max:255',

        ]);
        Announcements::create($request->all());
        return redirect()->route('announcement.view')->with('success', 'Announcement added Successfully');
    }
    public function edit(Announcements $announcements)
    {
        return view('pages.admin.announcements.edit', compact('announcements'));
    }
    public function update(Request $request, Announcements $announcement)
    {
        $request->validate([
            'title' => 'required|alpha|max:255',
            'message' => 'required|string|max:500',
        ]);
        $announcement->update($request->all());
        return redirect()->route('announcement.view')->with('success', 'Announcement added Successfully');
    }
    public function destroy(Announcements $announcement)
    {
        try {
            $announcement->delete();
            return redirect()->route('announcement.view')->with('success', 'Deleted Successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Announcement because it is referenced by one or more Announcement.';
            } else {
                $errorMessage = 'An error occurred while deleting the Announcement.';
            }
            return redirect()->route('announcement.view')->with('error', $errorMessage);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcements::paginate(5);
        return view('pages.announcements.announcement',compact('announcements'));
    }
    public function create(Announcements $announcement)
    {
        return view('pages.announcement.add',compact('announcement'));
    }
    public function store(Request $request)
    {
       $request->validate([
          'title' => 'required|string|max:255',
          'message' => 'required|string|max:255',
          
       ]);
       Announcements::create($request->all());
       return redirect()->route('announcement.view')->with('success', 'Announcement added Successfully');
    }
    Public function edit(Announcements $announcements)
    {
        return view('pages.announcements.edit',compact('announcements'));
    }
    public function update(Request $request,Announcements $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:500',
         ]);
         $announcement->update($request->all());
         return redirect()->route('announcement.view')->with('success', 'Announcement added Successfully');
    }
}



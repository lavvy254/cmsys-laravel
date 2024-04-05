<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Sermon;
use App\Models\Events;


class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::paginate(5);
        $events = Events::all();
        if (Auth()->user()->roles == 'admin') {
            return view('pages.admin.sermon.sermon', compact('sermons'));
        } elseif (auth()->user()->roles == 'user') {
            return view('pages.members.sermon.sermon', compact('sermons'));
        } else {
            return route('login');
        }
    }
    public function create()
    {
        $events = Events::all();
        return view('pages.admin.sermon.add', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'speaker' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',
            'title' => 'required|string|max:255',
        ]);
        Sermon::create($request->all());
        return redirect()->route('sermon.view')->with('success', 'Sermon added Successfully');
    }
    public function edit(Sermon $sermons)
    {
        $events = Events::all();
        return view('pages.admin.sermon.edit', compact('sermons', 'events'));
    }
    public function update(Request $request, Sermon $sermon)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_id' => 'required|exists:event,id',
            'speaker' => 'required|string|max:500',
        ]);
        $sermon->update($request->all());
        return redirect()->route('sermon.view')->with('success', 'Sermon added Successfully');
    }
    public function destroy(Sermon $sermon)
    {
        try {
            $sermon->delete();
            return redirect()->route('sermon.view')->with('success', 'Deleted Successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Sermon because it is referenced by one or more table.';
            } else {
                $errorMessage = 'An error occurred while deleting the Sermon.';
            }
            return redirect()->route('sermon.view')->with('error', $errorMessage);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sermon;
use App\Models\Events;


class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::paginate(5);
        $events =Events::all();
        return view('pages.sermon.sermon',compact('sermons'));
    }
    public function create()
    {
        $events =Events::all();
        return view('pages.sermon.add',compact('events'));
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
    Public function edit(Sermon $sermons)
    {
        $events=Events::all();
        return view('pages.sermon.edit',compact('sermons','events'));
    }
    public function update(Request $request,Sermon $sermon)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_id' => 'required|exists:event,id',
            'speaker' => 'required|string|max:500',
         ]);
         $sermon->update($request->all());
         return redirect()->route('sermon.view')->with('success', 'Sermon added Successfully');
    }
}
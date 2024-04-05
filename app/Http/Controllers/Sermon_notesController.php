<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Sermon;
use App\Models\SermonNotes;
use App\Models\User;

class Sermon_notesController extends Controller
{
    public function index()
    {
        $users = User::all();
        $Sermon = Sermon::all();
        $snotes = SermonNotes::paginate(5);
    
        if (Auth()->user()->roles =='admin')
        {
            return view('pages.admin.sermon.sermon_notes.sermonnotes',compact('snotes'));
        }elseif(Auth()->user()->roles =='user'){
            return view('pages.members.sermonnotes.sermonnotes',compact('snotes'));
        }else{
            return route('login');
        }
    }
    public function create()
    {
        $members = User::all();
        $sermons = Sermon::all();
        return view('pages.admin.sermon.sermon_notes.add',compact('sermons'));
    }
    public function store(Request $request)
    {
       $request->validate([
          'sermon_id' => 'required|exists:sermon,id',
          'notes' => 'required|string|max:255',
       ]);
       SermonNotes::create($request->all());
       return redirect()->route('snote.view')->with('success', 'Sermon Notes added Successfully');
    }
    Public function edit(SermonNotes $snotes)
    {
        $members=User::all();
        $sermons = Sermon::all();
        return view('pages.admin.sermon.sermon_notes.edit',compact('snotes','members','sermons'));
    }
    public function update(Request $request,SermonNotes $snotes)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sermon_id' => 'required|exists:groups,id',
            'notes' => 'required|string|max:500',
         ]);
         $snotes->update($request->all());
         return redirect()->route('snotes.view')->with('success', 'Edited successfully');
    }
    public function destroy(Sermon $sermon)
    {
        try {
            $sermon->delete();
            return redirect()->route('snotes.view')->with('success', 'Deleted Successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Sermonnote because it is referenced by one or more table.';
            } else {
                $errorMessage = 'An error occurred while deleting the Sermonnote.';
            }
            return redirect()->route('snotes.view')->with('error', $errorMessage);
        }
    }
}

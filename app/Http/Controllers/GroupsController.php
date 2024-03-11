<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\User;


class GroupsController extends Controller
{
    public function index()
    {
        $groups=Groups::paginate(5);
        return view('pages.groups.view',compact('groups'));
    }
    public function create()
    {
        $leaders = User::all();
        return view('pages.groups.create',compact('leaders'));
    }
    public function store(Request $request)
    {
       $request->validate([
          'gname' => 'required|string|max:255',
          'leader_id' => 'required|exists:users,id',
          'description' => 'required|string|max:255',
       ]);
       Groups::create($request->all());
       return redirect()->route('groups.view')->with('success', 'New Request added Successfully');
    }
}

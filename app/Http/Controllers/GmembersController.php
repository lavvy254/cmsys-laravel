<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Gmembers;
use App\Models\User;

class GmembersController extends Controller
{
  public function index()
  {
    $users = User::all();
    $groups = Groups::all();
    $gmembers = Gmembers::paginate(5);
    return view('pages.admin.groups.members.view', compact('gmembers'));
  }
  public function create()
  {
    $members = User::all();
    $groups = Groups::all();
    return view('pages.admin.groups.members.add', compact('members', 'groups'));
  }
  public function store(Request $request)
  {
    $request->validate([
      'user_id' => 'required|exists:users,id',
      'group_id' => 'required|exists:groups,id',
      'description' => 'required|string|max:255',
    ]);
    Gmembers::create($request->all());
    return redirect()->route('gmembers.view')->with('success', 'New Member added Successfully');
  }
  public function edit(Gmembers $gmembers)
  {
    $members = User::all();
    $groups = Groups::all();
    return view('pages.admin.groups.members.edit', compact('gmembers', 'members', 'groups'));
  }
  public function update(Request $request, Gmembers $gmembers)
  {
    $request->validate([
      'user_id' => 'required|exists:users,id',
      'group_id' => 'required|exists:groups,id',
      'description' => 'required|string|max:500',
    ]);
    $gmembers->update($request->all());
    return redirect()->route('gmembers.view')->with('success', 'Edited successfully');
  }
  public function destroy(Gmembers $gmembers)
  {
    $gmembers->delete();
    return redirect()->route('gmembers.view')->with('success', 'Deleted Successfully');
  }
}

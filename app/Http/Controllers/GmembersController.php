<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
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
  public function destroy(Gmembers $gmember)
    {
        try {
            $gmember->delete();
            return redirect()->route('gmembers.view')->with('success', 'Deleted Successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this Gmember because it is referenced by one or more table.';
            } else {
                $errorMessage = 'An error occurred while deleting the Gmember.';
            }
            return redirect()->route('gmembers.view')->with('error', $errorMessage);
        }
    }
}
  
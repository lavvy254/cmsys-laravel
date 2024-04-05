<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Groups;
use App\Models\User;
use App\Models\Gmembers;


class GroupsController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'admin') {
            $groups = Groups::paginate(5);
            return view('pages.admin.groups.view', compact('groups'));
        } else {
            $groups = Groups::paginate(5);
            return view('pages.members.groups.groups', compact('groups'));
        }
    }
    public function create()
    {
        $leaders = User::all();
        return view('pages.admin.groups.create', compact('leaders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'gname' => 'required|string|max:255',
            'leader_id' => 'required|exists:users,id',
            'description' => 'required|string|max:255',
        ]);
        Groups::create($request->all());
        return redirect()->route('groups.view')->with('success', 'New Group added Successfully');
    }
    public function edit(Groups $groups)
    {
        $leaders = User::all();
        return view('pages.admin.groups.edit', compact('groups', 'leaders'));
    }
    public function update(Request $request, Groups $groups)
    {
        $request->validate([
            'gname' => 'required|string|max:255',
            'leader_id' => 'required|exists:users,id',
            'description' => 'required|string|max:500',
        ]);
        $groups->update($request->all());
        return redirect()->route('groups.view')->with('success', 'New Group added Successfully');
    }
    public function joinGroup(Request $request)
    {
        // Retrieve the group ID from the form
        $groupId = $request->input('group_id');

        // Check if the user is already a member of the group
        $isMember = Gmembers::where('user_id', auth()->id())
            ->where('group_id', $groupId)
            ->exists();

        if ($isMember) {
            return redirect()->back()->with('error', 'You are already a member of this group.');
        }

        // Create a new group member record
        $groupMember = new Gmembers();
        $groupMember->user_id = auth()->id(); // Assuming you're using Laravel's authentication
        $groupMember->group_id = $groupId;
        $groupMember->save();

        // Redirect back or to a different page
        return redirect()->back()->with('success', 'Joined group successfully');
    }
    public function destroy(Groups $groups)
    {
        try{
            $groups->delete();
            return redirect()->route('groups.view')->with('success', 'Deleted Successfully');
        }catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete this group because it is referenced by one or more table.';
            } else {
                $errorMessage = 'An error occurred while deleting the group.';
            }
            return redirect()->route('groups.view')->with('error', $errorMessage);
        }
    }
}

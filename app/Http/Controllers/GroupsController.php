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
}

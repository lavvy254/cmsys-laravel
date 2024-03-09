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
         return view('pages.groups.members.view',compact('gmembers'));
    }
  
}

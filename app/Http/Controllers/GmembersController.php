<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GmembersController extends Controller
{
    public function index()
    {
        return view('pages.groups.members.view');
    }
  
}

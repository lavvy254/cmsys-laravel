<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GivingController extends Controller
{
    public function index()
    {
        return view('pages.giving.give');
    }
}

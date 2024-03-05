<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giving;

class GivingController extends Controller
{
    public function index()
    {
        $givings = Giving::paginate(5);
        return view('pages.giving.give',compact('givings'));
    }
}

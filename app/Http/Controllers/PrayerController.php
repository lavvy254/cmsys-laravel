<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prayer;

class PrayerController extends Controller
{
    public function index()
    {
        $prayers = Prayer::all();

        return view('pages.table_list',compact('prayers'));
    }
}

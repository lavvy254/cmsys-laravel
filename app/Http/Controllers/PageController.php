<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use App\Models\PrayerRequests;
use App\Models\User;

class PageController extends Controller

{

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        $prayers = Prayer::paginate(3);
        $members = User::paginate(3);
        $prayerrequests = PrayerRequests::paginate(3);
        return view('pages.tables', compact('prayers', 'prayerrequests', 'members'));
    }
}

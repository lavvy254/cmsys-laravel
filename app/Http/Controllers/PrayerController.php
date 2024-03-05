<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prayer;

class PrayerController extends Controller
{
    public function index()
    {
        $prayers = Prayer::all();

        return view('pages.table_list', compact('prayers'));
    }
    public function create()
    {
        return view('pages.prayer.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        

        Prayer::create($request->all());
        return redirect()->route('pages.tables')->with('success', 'New Prayer added Successfully');
    }
    public function edit(Prayer $prayer)

    {
        if (!$prayer) {
            return redirect()->route('pages.tables')->with('error', 'Prayer  not found');
        }
        return view('pages.prayer.edit', compact('prayer'));
    }
    public function update(Prayer $prayer, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        $prayer->update($request->all());

        return redirect()->route('pages.tables')->with('success', 'Prayer updated successfully.');
    }
     public function destroy(Prayer $prayer)
    {
        $prayer->delete();

        return redirect()->route('pages.tables')->with('success', 'Prayer Removed successfully.');
    }
}

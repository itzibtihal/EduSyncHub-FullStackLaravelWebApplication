<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('from')->get();
        return view('director.holiday.index', compact('holidays'));
    }


    public function store(Request $request)
    {
        $holiday = new Holiday;
        $holiday->title = $request->input('title');
        $holiday->from = $request->input('from');
        $holiday->to = $request->input('to');
        $holiday->save();

        return redirect()->route('director.holidays')->with('success', 'Holiday created successfully');
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        return redirect()->route('director.holidays')->with('success', 'Holiday deleted successfully');
    }
}

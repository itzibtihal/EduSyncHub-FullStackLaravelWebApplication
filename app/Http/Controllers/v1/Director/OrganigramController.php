<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Level;
use App\Models\Speciality;
use Illuminate\Http\Request;

class OrganigramController extends Controller
{
    public function index()
    {
        // $cyclesWithLevels = Cycle::with('levels')->get();
        // $cyclesWithLevelsAndSpecialities = Cycle::with('levels.specialities')->get();

    // Fetch default speciality if cycle is not high school
    // $defaultSpeciality = Speciality::where('name', 'Default')->first();

    // $cycles = Cycle::with(['levels', 'specialities'])->get();

 
        // return view('Director.organigram.index',compact('cycles'));
        return view('Director.organigram.index');
    }   

    public function storelevel(Request $request)
    {
        $validatedData = $request->validate([
            'cycle_id' => 'required|exists:cycles,id',
            'name' => 'required|string',
        ]);

        $cycle = Cycle::findOrFail($validatedData['cycle_id']);
        $levelName = $validatedData['name'] . '(' . $cycle->name . ')';

        $level = new Level();
        $level->cycle_id = $cycle->id;
        $level->name = $levelName;
        $level->save();

        return redirect()->route('director.organigram')->with('success', 'Level stored successfully.');
    }
}

<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Level;
use App\Models\LevelSectionSpeciality;
use App\Models\LevelSpeciality;
use App\Models\Section;
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
        $levels = Level::where('cycle_id', 1)->with('levelSpecialities.sections')->get();
        $hlevels = Level::where('cycle_id', 2)->with('levelSpecialities.sections')->get();
    
        return view('Director.organigram.index',compact('levels','hlevels'));
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

    public function storespeciality(Request $request)
    {
        $validatedData = $request->validate([
            'level_id' => 'required|exists:levels,id',
            'name' => 'required|string',
        ]);

        $level = Level::findOrFail($validatedData['level_id']);
        $specialityName = $validatedData['name'] . '(' . $level->name . ')';

        $speciality = new Speciality();
        $speciality->name = $specialityName;
        // dd($speciality);
        $speciality->save();

        $level->levelSpecialities()->attach($speciality->id);

        return redirect()->route('director.organigram')->with('success', 'Speciality stored successfully.');
    }

    public function storesection(Request $request)
    {
        $validatedData = $request->validate([
            'speciality_id' => 'required|exists:specialities,id',
            'name' => 'required|string',
        ]);

        $speciality = Speciality::findOrFail($validatedData['speciality_id']);
        $sectionName = $validatedData['name'] . '(' . $speciality->name . ')';

        $newSection = new Section();
        $newSection->name = $sectionName;
        // dd($newSection);
        $newSection->save();

        $speciality->specialities()->attach($newSection->id);

        $levelSpeciality = LevelSpeciality::where('speciality_id', $speciality->id)->first();
        $level_id = $levelSpeciality->level_id;
        $level = Level::findOrFail($level_id);
        $cycle_id = $level->cycle_id;
        
        $section = LevelSectionSpeciality::create([
            'level_id' => $level_id,
            'cycle_id' => $cycle_id,
            'speciality_id' => $speciality->id,
            'section_id' => $newSection->id,
        ]);

        return redirect()->route('director.organigram')->with('success', 'Section stored successfully.');
    }
}

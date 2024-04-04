<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\LevelSectionSpeciality;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
    //    $specialitiesfirstcycle = LevelSectionSpeciality::with('section')->where('cycle_id', 1)->get();
    $specialities = LevelSectionSpeciality::with('section')->where('cycle_id', 1)->get();

    
    //  dd($specialities);
    // Iterate over each LevelSectionSpeciality object
    foreach ($specialities as $speciality) {
        // Access the sections related to the current speciality
        $sections = $speciality->section->pluck('name');

        // Output the sections using dd
        //  dd($sections);
    }
       return view('Director.Classes.index', compact('specialities'));
    }

    public function students()
    {
        return view('Director.Classes.students');
    }
}



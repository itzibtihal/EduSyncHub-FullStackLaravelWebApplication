<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Discipline;
use App\Models\LevelSectionSpeciality;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    public function index()
    {
        //    $specialitiesfirstcycle = LevelSectionSpeciality::with('section')->where('cycle_id', 1)->get();
        $specialitiesmidle = LevelSectionSpeciality::where('cycle_id', 1)->get();
        $specialitieshigh = LevelSectionSpeciality::where('cycle_id', 2)->get();


        //  dd($specialities);
        // Iterate over each LevelSectionSpeciality object
        // foreach ($specialities as $speciality) {
        //     // Access the sections related to the current speciality
        //     $sections = $speciality->section->pluck('name');

        //     // Output the sections using dd
        //     //  dd($sections);
        // }
        $sections = Section::all();
        return view('Director.Classes.index',  ['specialities' => $specialitiesmidle], ['specialitieshigh' => $specialitieshigh]);
    }

    public function students($section)
{
    $section = Section::with(['users', 'users.disciplines'])->find($section);

    if (!$section) {
        return redirect()->back()->with('error', 'Section not found.');
    }

    $students = $section->users;

    return view('Director.Classes.students', compact('students'));
}





    public function getStudentDetails($id)
    {
        $student = User::find($id);
         
        if ($student) {
            $student->avatar = Storage::url($student->avatar);

            // Count the number of justified absences
            $student->justified_absences = Absence::where('user_id', $id)
                ->where('reason', 'justified')
                ->count();
    
            // Count the number of unjustified absences
            $student->unjustified_absences = Absence::where('user_id', $id)
                ->where('reason', 'injustified')
                ->count();
            
            $discipline = Discipline::where('user_id', $id)->latest()->first();
                if ($discipline) {
                    $student->discipline = $discipline->discipline;
                    $student->note = $discipline->note;
                }

            return response()->json($student);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    public function storeDiscipline(Request $request)
    {
        $discipline = new Discipline;
        $discipline->user_id = $request->input('user_id');
        $discipline->discipline = $request->input('discipline');
        $discipline->note = $request->input('note');
        $discipline->save();
        // return response()->json(['message' => 'Discipline stored successfully']);
        return redirect()->back()->with('success', 'Discipline stored successfully');
    }
}

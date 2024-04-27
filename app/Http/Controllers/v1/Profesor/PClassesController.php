<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Discipline;
use App\Models\LevelSectionSpeciality;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PClassesController extends Controller
{
    public function index()
    {
        //    $specialitiesfirstcycle = LevelSectionSpeciality::with('section')->where('cycle_id', 1)->get();
        $specialitiesmidle = LevelSectionSpeciality::where('cycle_id', 1)->get();
        $specialitieshigh = LevelSectionSpeciality::where('cycle_id', 2)->get();


        //  dd($specialities);
        // foreach ($specialities as $speciality) {
        //     $sections = $speciality->section->pluck('name');

        //     //  dd($sections);
        // }
        $sections = Section::all();
        return view('teacher.Classes.index',  ['specialities' => $specialitiesmidle], ['specialitieshigh' => $specialitieshigh]);
    }

    public function students($section)
{
    $section = Section::with(['users', 'users.disciplines'])->find($section);
//     SELECT d.note , d.discipline ,u.firstname , u.lastname FROM disciplines d
// JOIN users u ON d.user_id = u.id
// JOIN section_user us ON u.id = us.user_id
// WHERE us.section_id = 11;

    if (!$section) {
        return redirect()->back()->with('error', 'Section not found.');
    }

    $students = $section->users;

    return view('teacher.Classes.students', compact('students'));
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
                // SELECT COUNT(*) AS justified_absences FROM absences
                // WHERE user_id = $id
                // AND reason = 'justified';

    
            // Count the number of unjustified absences
            $student->unjustified_absences = Absence::where('user_id', $id)
                ->where('reason', 'injustified')
                ->count();
            
            $discipline = Discipline::where('user_id', $id)->latest()->first();
            // SELECT * FROM disciplines
            // WHERE user_id = 14
            // ORDER BY created_at DESC
            // LIMIT 1;
            
                if ($discipline) {
                    $student->discipline = $discipline->discipline;
                    $student->note = $discipline->note;
                }

            return response()->json($student);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    
}

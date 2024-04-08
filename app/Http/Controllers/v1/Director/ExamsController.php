<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Section;
use App\Models\Speciality;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserInstitution;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function index()
    {
        return view('director.exams.index');
    }

    public function create()
    {
        $cycles = Cycle::all();
        $levels = Level::all();
        $specialities = Speciality::all();
        $sections = Section::all();
        $subjects = Subject::all();
        $userInstitutions = auth()->user()->institutions->pluck('id')->toArray();


        $userIds = UserInstitution::whereIn('institution_id', $userInstitutions)
            ->pluck('user_id')
            ->toArray();


        $professors = User::whereIn('id', $userIds)
            ->where('role_id', 2)
            ->get();


        return view('director.exams.add', compact('cycles', 'levels', 'specialities', 'sections', 'subjects', 'professors'));
    }

    public function store(Request $request)
    {
        // Get the request data
    $data = $request->all();
    
    // Assign the authenticated user's ID to the created_by field
    $data['created_by'] = auth()->id();

    // Create the exam using the request data
    $exam = Exam::create($data);
        dump($exam);
        // Check if the exam was created successfully
        if ($exam) {
            return redirect()->route('director.exams')->with('success', 'Exam created successfully.');
        } else {
            return back()->with('error', 'Failed to create exam.');
        }
    }
    

    public function edit($id)
    {
        return view('director.exams.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('director.exams')->with('success', 'Exam updated successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('director.exams')->with('success', 'Exam deleted successfully.');
    }
}

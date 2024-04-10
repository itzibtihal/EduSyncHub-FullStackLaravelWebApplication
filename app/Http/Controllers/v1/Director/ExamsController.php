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
        $exams = Exam::all();
        return view('director.exams.index', compact('exams'));
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
        $data = $request->all();
        $data['created_by'] = auth()->id();
        $exam = Exam::create($data);
        // dump($exam);

        if ($exam) {
            return redirect()->route('director.exams')->with('success', 'Exam created successfully.');
        } else {
            return back()->with('error', 'Failed to create exam.');
        }
    }


    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
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
    
        return view('director.exams.edit', compact('exam', 'cycles', 'levels', 'specialities', 'sections', 'subjects', 'professors'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $data = $request->all();
        $data['created_by'] = auth()->id();
        
        $exam->fill($data);

        if ($exam->save()) {
            return redirect()->route('director.exams')->with('success', 'Exam updated successfully.');
        } else {
            return back()->with('error', 'Failed to update exam.');
        }
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        if ($exam->delete()) {
            return redirect()->route('director.exams')->with('success', 'Exam deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete exam.');
        }
    }
}

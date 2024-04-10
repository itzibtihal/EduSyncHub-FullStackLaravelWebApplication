<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Section;
use App\Models\Speciality;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PExamsController extends Controller
{
    public function index()
    {
        $professorId = Auth::id();
        $exams = Exam::where('professor_id', $professorId)->get();
        return view('teacher.exams.index', compact('exams'));
    }

    
    public function create()
    {
        $cycles = Cycle::all();
        $levels = Level::all();
        $specialities = Speciality::all();
        $sections = Section::all();
        $subjects = Subject::all();
       

        return view('teacher.exams.add', compact('cycles', 'levels', 'specialities', 'sections', 'subjects'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->id();
        $exam = Exam::create($data);
        // dump($exam);

        if ($exam) {
            return redirect()->route('professor.exams.index')->with('success', 'Exam created successfully.');
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
        
    
        return view('teacher.exams.edit', compact('exam', 'cycles', 'levels', 'specialities', 'sections', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $data = $request->all();
        $data['created_by'] = auth()->id();
        
        $exam->fill($data);

        if ($exam->save()) {
            return redirect()->route('professor.exams.index')->with('success', 'Exam updated successfully.');
        } else {
            return back()->with('error', 'Failed to update exam.');
        }
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        if ($exam->delete()) {
            return redirect()->route('professor.exams.index')->with('success', 'Exam deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete exam.');
        }
    }
}

<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();
    
        $absences = Absence::orderBy('created_at', 'desc')
                            ->paginate(20);
    
    
        return view('director.absence.index', compact('absences')); 
    }

    public function create()
    {
        $subjects = Subject::all();
        $sections = Section::all();

        return view('director.absence.create', compact('subjects', 'sections'));
    }


    public function store(Request $request)
    {
        
        $userIds = (array) $request->input('user_id');
        $subjectId = $request->input('subject_id');
        $sectionId = $request->input('section_id');
        $startsAt = $request->input('starts_at');
        $endsAt = $request->input('ends_at');
        $reason = $request->input('reason');

        
        foreach ($userIds as $userId) {
            //  new absence  for each user
            $absence = new Absence();
            $absence->created_by = Auth::id();
            $absence->subject_id = $subjectId;
            $absence->section_id = $sectionId;
            $absence->starts_at = $startsAt;
            $absence->ends_at = $endsAt;
            $absence->reason = $reason;
            $absence->user_id = $userId; 
            $absence->save();
        }

        return redirect()->route('director.absence')->with('success', 'Absence report(s) have been created successfully.');
    }


     
    // public function edit(Absence $absence)
    // {
    //     $subjects = Subject::all();
    //     $sections = Section::all();

    //     return view('director.absence.edit', compact('absence', 'subjects', 'sections'));
    // }

    public function update(Request $request, Absence $absence)
    {
        $absence->update($request->all());

        return redirect()->route('director.absence')->with('success', 'Absence report updated successfully.');
    }


    public function getUsersInSection(Request $request)
    {
        $users = User::whereHas('sections', function ($query) use ($request) {
            $query->where('section_id', $request->section_id);
        })->get();

        return response()->json($users);
    }


    public function destroy(Absence $absence)
    {
        $absence->delete();

        return redirect()->route('director.absence')->with('success', 'Absence report deleted successfully.');
    }
}

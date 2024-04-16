<?php

namespace App\Http\Controllers\v1\profesor;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Subject;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {

        return view('teacher.absence.index');
    }

    public function create()
    {
        $subjects = Subject::all();
        $sections = Section::all();

        return view('teacher.absence.create', compact('subjects', 'sections'));
    }


    public function store(Request $request)
    {
        // Access the incoming request data
        $userIds = (array) $request->input('user_id');
        $subjectId = $request->input('subject_id');
        $sectionId = $request->input('section_id');
        $startsAt = $request->input('starts_at');
        $endsAt = $request->input('ends_at');
        $reason = $request->input('reason');

        // Loop through each user_id in the array
        foreach ($userIds as $userId) {
            // Create a new absence record for each user
            $absence = new Absence();
            $absence->created_by = Auth::id();
            $absence->subject_id = $subjectId;
            $absence->section_id = $sectionId;
            $absence->starts_at = $startsAt;
            $absence->ends_at = $endsAt;
            $absence->reason = $reason;
            $absence->user_id = $userId; // Assign the user_id
            $absence->save();
        }

        // Redirect to a success page or return a response
        // For example:
        return redirect()->route('teacher.absence')->with('success', 'Absence report(s) have been created successfully.');
    }



    public function getUsersInSection(Request $request)
    {
        $users = User::whereHas('sections', function ($query) use ($request) {
            $query->where('section_id', $request->section_id);
        })->get();

        return response()->json($users);
    }
}

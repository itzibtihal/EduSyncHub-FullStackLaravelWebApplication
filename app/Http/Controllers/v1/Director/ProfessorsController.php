<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    public function create()
    {
        return view('director.users.professors.add');
    }

    public function store(CreateStudentRequest $request)
    {
        // Validate the request using the CreateStudentRequest

        // Create the student record
        // $student = new Student();
        // $student->fill($request->validated());
        // $student->save();

        // Redirect to a success page or another route
        return redirect()->route('student.dashboard')->with('success', 'Student created successfully!');
    }
}

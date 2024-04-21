<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Models\Cycle;
use App\Models\Level;
use App\Models\Section;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function create()
    {
        $specialities = Speciality::all();
        $levels = Level::all();
        $sections = Section::all();
        $cycles = Cycle::all();

        return view('director.users.students.add', compact('specialities', 'levels', 'sections', 'cycles'));
       
    }

    // public function store(CreateStudentRequest $request)
    // {
    //     // Validate the request using the CreateStudentRequest

    //     // Create the student record
    //     // $student = new Student();
    //     // $student->fill($request->validated());
    //     // $student->save();

    //     // Redirect to a success page or another route

    //     return redirect()->route('student.dashboard')->with('success', 'Student created successfully!');
    // }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'section_id' => 'required|exists:sections,id',
        'email' => 'required|email',
        'phone' => 'required',
        'dateofbirth' => 'required|date',
        'status' => 'required',
        'address' => 'required',
        'monthly_amount' => 'required|numeric',
    ]);

    // Create a new student
    $student = new User(); 
    $student->firstname = $validatedData['firstname'];
    $student->lastname = $validatedData['lastname'];
    $student->email = $validatedData['email'];
    $student->phone = $validatedData['phone'];
    $student->dateofbirth = $validatedData['dateofbirth'];
    $student->status = $validatedData['status'];
    $student->address = $validatedData['address'];
    $student->monthly_amount = $validatedData['monthly_amount'];
    $student->password = bcrypt($validatedData['email']);
    $student->role_id = $request->input('role_id');
    $student->isActive = $request->input('isActive');
      // Save the avatar  
      if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->storeAs('public/avatars', $request->file('avatar')->getClientOriginalName());
        $student->avatar = str_replace('public/', '', $avatarPath);
    }
    $student->save();

    // Attach the student to the section
    $section = Section::findOrFail($validatedData['section_id']);
    $section->users()->attach($student->id, ['academicyear_id' => 1]); // Assuming academic year ID is 1

    return redirect()->route('director.students')->with('success', 'Student stored successfully.');
}
}

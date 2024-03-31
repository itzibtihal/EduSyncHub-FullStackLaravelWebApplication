<?php

namespace App\Http\Controllers\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        // Logic for teacher dashboard
        return view('student.dashboard');
    }
}

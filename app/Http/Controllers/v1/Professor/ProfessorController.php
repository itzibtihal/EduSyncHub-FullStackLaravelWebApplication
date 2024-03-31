<?php

namespace App\Http\Controllers\v1\Professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function dashboard()
    {
        // Logic for teacher dashboard
        return view('professor.dashboard');
    }
}

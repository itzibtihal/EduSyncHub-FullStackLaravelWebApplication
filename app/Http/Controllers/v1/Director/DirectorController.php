<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function dashboard()
    {
        // Logic for teacher dashboard
        return view('Director.dashboard');
    }

    
    public function students()
    {
        
        return view('Director.users.students.index');
    }
}

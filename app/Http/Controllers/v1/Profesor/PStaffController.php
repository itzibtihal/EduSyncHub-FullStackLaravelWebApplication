<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PStaffController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)
        ->leftJoin('user_institution', 'users.id', '=', 'user_institution.user_id')
        ->leftJoin('institutions', 'user_institution.institution_id', '=', 'institutions.id')
        ->select('users.*', 'institutions.name as institution_name')
        ->get();
        return view('teacher.staff.index' , compact('users'));
    }
}

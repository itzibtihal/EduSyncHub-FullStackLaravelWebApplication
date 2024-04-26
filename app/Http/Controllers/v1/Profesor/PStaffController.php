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

        // SELECT users.*, institutions.name AS institution_name
        // FROM users
        // LEFT JOIN user_institution ON users.id = user_institution.user_id
        // LEFT JOIN institutions ON user_institution.institution_id = institutions.id
        // WHERE users.role_id = 2;

        return view('teacher.staff.index' , compact('users'));
    }
}
 
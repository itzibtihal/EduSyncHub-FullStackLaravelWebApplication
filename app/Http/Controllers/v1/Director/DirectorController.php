<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInstitution;
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
    
    
    public function professors()
    {
        $userInstitutions = auth()->user()->institutions->pluck('id')->toArray();

    
    $userIds = UserInstitution::whereIn('institution_id', $userInstitutions)
        ->pluck('user_id')
        ->toArray();

    
    $users = User::whereIn('id', $userIds)
        ->where('role_id', 2)
        ->get();


        if ($users->isEmpty()) {
            
            echo 'No users found';
            return view('Director.users.professors.index', compact('users'));
        }

        $Professors = User::whereIn('id', $userIds)
        ->where('role_id', 2)
        ->latest()
        ->take(4)
        ->get();

        return view('Director.users.professors.index', compact('users', 'Professors'));
    }

}

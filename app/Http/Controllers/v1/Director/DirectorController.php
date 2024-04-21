<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Exam;
use App\Models\User;
use App\Models\UserInstitution;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function dashboard()
    {
        $userCount = User::where('role_id', 3)->count();
        $examsCount = Exam::whereDate('created_at', today())->count();
        $absenceCount = Absence::count();
        $lastUsers = User::latest()->take(4)->get();
        $lastExams = Exam::latest()->take(4)->get();
        // Logic for teacher dashboard
        return view('Director.dashboard',compact('userCount','examsCount','absenceCount','lastUsers','lastExams'));
    }


    public function students()
    {
        
        $students = User::where('role_id', 3)
            ->latest()
            ->take(4)
            ->get();

        $allstudents = User::where('role_id', 3)
            ->paginate(5);
        

        return view('Director.users.students.index', compact('students', 'allstudents'));

       
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

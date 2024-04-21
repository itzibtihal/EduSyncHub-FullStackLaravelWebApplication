<?php

namespace App\Http\Controllers\v1\Professor;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;
use App\Models\Exam;

class ProfessorController extends Controller
{
    public function dashboard()
    {
        // Logic for teacher dashboard
        $exams = Exam::where('created_by', auth()->id())->take(4)->get();
        $absences = Absence::where('created_at', '>=', now()->startOfDay())
            ->where('created_at', '<=', now()->endOfDay())
            ->take(4)
            ->get();
        return view('teacher.dashboard', ['exams' => $exams], ['absences' => $absences]);
    }
}
 
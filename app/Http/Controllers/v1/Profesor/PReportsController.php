<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PReportsController extends Controller
{
    public function index(){
        return view('teacher.report.index');
    }
}

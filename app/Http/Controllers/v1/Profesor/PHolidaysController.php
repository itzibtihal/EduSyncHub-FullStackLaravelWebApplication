<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class PHolidaysController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('from')->get();
        return view('teacher.holiday.index', compact('holidays'));
    }
}

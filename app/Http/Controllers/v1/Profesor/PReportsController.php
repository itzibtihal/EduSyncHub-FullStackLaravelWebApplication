<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use App\Models\YearlyTimesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PReportsController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $year = date('Y'); // Get the current year
        $timesheet = Timesheet::where('user_id', $userId)->first();
        $yearlyTimesheet = YearlyTimesheet::where('year', $year)->orderBy('created_at', 'desc')->first();

        if ($timesheet) {
            $filePath = 'timesheets/' . $timesheet->file;
           
           

        }
        
        elseif ($yearlyTimesheet) {
            // $filePath = 'yearlytimesheets/' . $yearlyTimesheet->file;
            $filePath = asset('storage/yearlytimesheets/timesheet_2024.xlsx');

          
            
        }
        
         
        else {
              $filePath = 'No timesheet files available';
        }

        //dd($filePath);

        return view('teacher.report.index',compact('filePath','timesheet','yearlyTimesheet'));
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:xlsx|max:10240', // Max 10MB
        ]);

       
        $userId = Auth::id();

        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('timesheets', $fileName); 
        } else {
            return back()->with('error', 'File upload failed.'); 
        }

        // Create a new Timesheet record
        $timesheet = new Timesheet();
        $timesheet->user_id = $userId;
        $timesheet->file = $filePath;
        $timesheet->save();

        return redirect()->route('professor.reports.index')->with('success', 'Timesheet uploaded successfully.');
    }
}

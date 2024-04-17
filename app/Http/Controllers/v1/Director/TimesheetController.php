<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        // $timesheets = Timesheet::latest('created_at')->groupBy('user_id')->get();
        $timesheets = Timesheet::select('id', 'user_id','file', 'created_at')
    ->whereIn('id', function ($query) {
        $query->selectRaw('MAX(id)')
            ->from('timesheets')
            ->groupBy('user_id');
    })
    ->latest('created_at')
    ->get();
        return view('director.timsheet.index', compact('timesheets'));
    }

    public function validateTimesheet($timesheetId)
    {
        // Perform validation logic here
        $timesheet = Timesheet::find($timesheetId);
        $timesheet->is_valid = 1;
        $timesheet->save();

        return redirect()->back();
    }
}

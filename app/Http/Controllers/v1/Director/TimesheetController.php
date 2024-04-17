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
        $timesheets = Timesheet::select('id', 'user_id','file', 'created_at', 'is_valid')
    ->whereIn('id', function ($query) {
        $query->selectRaw('MAX(id)')
            ->from('timesheets')
            ->groupBy('user_id');
    })
    ->latest('created_at')
    ->get();
        return view('director.timsheet.index', compact('timesheets'));
    }

    // public function validateTimesheet($timesheetId)
    // {
    //     // Perform validation logic here
    //     $timesheet = Timesheet::find($timesheetId);
    //     $timesheet->is_valid = 1;
    //     $timesheet->save();

    //     return redirect()->back();
    // }
//     public function validateTimesheet(Request $request)
// {
//     // Get the timesheetId from the query parameters
//     $timesheetId = $request->query('id');

//     // Find the timesheet in the database
//     $timesheet = Timesheet::find($timesheetId);

//     // Perform validation logic here
//     // For example, update the is_valid field of the timesheet to 1
//     $timesheet->is_valid = 1;
//     $timesheet->save();

//     // Redirect back to the previous page, or wherever you want the user to go after validation
//     return redirect()->back();
// }

public function validateTimesheet(Request $request)
{
    $timesheetId = $request->input('timesheet_id');
    $timesheet = Timesheet::find($timesheetId);
    if (!$timesheet) {
        return response()->json(['error' => 'Timesheet not found.'], 404);
    }

    // Update the is_valid field to 1 (valid)
    $timesheet->is_valid = 1;
    $timesheet->save();

    return response()->json(['message' => 'Timesheet validated successfully.']);
}

}

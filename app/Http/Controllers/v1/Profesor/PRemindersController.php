<?php

namespace App\Http\Controllers\v1\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Illuminate\Http\Request;

class PRemindersController extends Controller
{
    public function __invoke()
    {
       
        $events = [];
 
        $reminders = Reminder::where('created_by', auth()->id())->get();;
 
        foreach ($reminders as $reminder) {
            $events[] = [
                'title' => $reminder->comments ?? 'Reminder',
                'start' => $reminder->start_time,
                'end' => $reminder->finish_time,
            ];
            // dd($events);
        }
        return view('teacher.reminders.index', compact('events'));

    }


    public function store(Request $request)
    {
        $reminder = new Reminder();
        $reminder->fill($request->all());
        $reminder->created_by = auth()->id();
        $reminder->save();
 
        return redirect()->route('teacher.reminders')->with('success', 'Reminder created successfully.');
    }
}

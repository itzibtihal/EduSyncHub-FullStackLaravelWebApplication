<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if ($user) {

            $institutions = $user->institutions;
            return view('director.users.professors.add', compact('institutions', 'user'));
        } else {

            abort(403, 'Unauthorized access.');
        }
    }

    // public function store(CreateStudentRequest $request)
    // {
    //     $user = new User();
    //     $user->fill($request->all());
    //     $user->password = bcrypt($request->password);
    //     $user->role_id = 2;
    //     $user->save();
    //     $user->institutions()->attach($request->institution_id);

    //     return redirect()->route('director.professors')->with('success', 'Professor created successfully.');
    // }

    public function store(CreateStudentRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->role_id = 2;

        // Save the avatar  
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->storeAs('public/avatars', $request->file('avatar')->getClientOriginalName());
            $user->avatar = str_replace('public/', '', $avatarPath);
        }

        // Save the CV 
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->storeAs('public/cv_files', $request->file('cv_file')->getClientOriginalName());
            $user->cv_file = str_replace('public/', '', $cvPath);
        }

        $user->save();

        $user->institutions()->attach($request->input('institution'));

        return redirect()->route('director.professors')->with('success', 'Professor created successfully.');
    }

    
}

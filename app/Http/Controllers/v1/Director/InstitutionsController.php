<?php

namespace App\Http\Controllers\v1\Director;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionsController extends Controller
{
   

    // public function index()
    // {
        
    //     $institutions = Institution::paginate(10);
    //     return view('Director.institution.index', compact('institutions'));
        
    // }

    public function index()
    {
        
        $user = auth()->user();
        $institutions = $user->institutions()->paginate(10);
        // $institutions = $user->institutions()->paginate(10);
        return view('Director.institution.index', compact('institutions'));
    }


    public function create()
    {
        return view('institutions.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'required|string|max:255',
    ]);

    // Create the institution
    $institution = Institution::create($request->all());

    // Attach the user to the institution
    $user = auth()->user();
    $user->institutions()->attach($institution->id);

    // Redirect with success message
    return redirect()->route('institutions.index')->with('success', 'Institution created successfully.');
}

    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return view('institutions.edit', compact('institution'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $institution = Institution::findOrFail($id);
        $institution->update($request->all());

        return redirect()->route('institutions.index')->with('success', 'Institution updated successfully.');
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete(); // Soft delete

        return redirect()->route('institutions.index')->with('success', 'Institution deleted successfully.');
    }
}

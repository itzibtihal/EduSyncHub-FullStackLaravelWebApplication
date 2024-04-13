<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $file_name = $request->file('file')->getClientOriginalName(); // getting file name
        $tmp_name = $request->file('file')->getPathname(); // getting temp name
        $file_up_name = time() . $file_name; // making file name dynamic by adding time before file name
        $request->file('file')->move(public_path('files'), $file_up_name);
    }
}

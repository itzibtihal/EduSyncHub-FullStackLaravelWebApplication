<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RoleHelper
{
    public static function checkRoleAndReturnView($role, $viewName)
    {
        $user = Auth::user();
        
        if (!$user) {
            abort(403, 'Unauthorized access.');
        }
        // dd(Auth::user());
        
        if ($user->role_id === $role) {
            return view($viewName);
        } else {
            abort(403, 'Unauthorized access.');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('welcome');
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();

            if ($user->isActive == 0) {
                Auth::logout();
                return back()->withInput()->withErrors([
                    'email' => 'Your account is inactive. Please contact the administrator.'
                ]);
            }

            switch ($user->role_id) {
                case 1:
                    return redirect()->route('director.dashboard');
                    break;
                case 2:
                    return redirect()->route('teacher.dashboard');
                    break;
                case 3:
                    return redirect()->route('student.dashboard');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }

        return back()->withInput()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function registerPage()
    {
        return view('Auth.Register');
    }

    // public function register(RegisterRequest $request)
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role,
    //     ]);

    //     Mail::to($request->email)->send(new WelcomeMail());

    //     Auth::login($user);

    //     switch ($user->role) {
    //         case 'teacher':
    //             return redirect()->route('teacher.dashboard');
    //             break;
    //         case 'student':
    //             return redirect()->route('student.dashboard');
    //             break;
    //         case 'director':
    //             return redirect()->route('director.dashboard');
    //             break;
    //         default:
    //             return redirect('/');
    //             break;
    //     }
    // }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

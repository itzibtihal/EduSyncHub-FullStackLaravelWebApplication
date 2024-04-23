<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;

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
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('welcome');
    }

    
    public function resetPassword()
    {
        return view('resetpass');
    }

     
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Email not found')->withErrors(['email' => 'Email not found']);
        }

        $email = $user->email;
        $token = Str::random(60);

        if ($user->remember_token) {
            $user->update(['remember_token' => null]);
        }

        $user->remember_token = $token;
        $user->save();

        
    
        Mail::to($user->email)->send(new ResetPassword($token, $email));
    
        return redirect()->back()->with('success', 'Password reset link sent to your email');
    }


   


  
































    // public function resetPasswordPost(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //     ]);

    //     // $token = Str::random(64);

    //     // DB::table('password_resets')->insert([
    //     //     'email' => $request->email,
    //     //     'token' => $token,
    //     //     'created_at' => Carbon::now(),
    //     // ]);

    //     // Mail::to($request->email)->send(new ResetPassword(['token' => $token]));

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }
}

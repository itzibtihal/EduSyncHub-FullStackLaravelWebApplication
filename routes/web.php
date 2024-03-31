<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\v1\Director\DirectorController;
use App\Http\Controllers\v1\Professor\ProfessorController;
use App\Http\Controllers\v1\Student\StudentController;
use App\Helpers\RoleHelper;
use App\Http\Controllers\v1\Director\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route::middleware(['custom.auth', 'check.director'])->get('/director/dashboard', [DirectorController::class, 'dashboard'])->name('director.dashboard');
// Route::middleware(['custom.auth'])->get('/dashboard', [DirectorController::class, 'dashboard'])->name('dashboard');


Route::middleware(['custom.auth'])->group(function () {
    Route::prefix('director')->group(function () {

        Route::get('/dashboard', function () {
            return RoleHelper::checkRoleAndReturnView(1, 'director.dashboard');
        })->name('director.dashboard');

        Route::get('/students', [DirectorController::class, 'students'])->name('director.students');
        Route::get('/students/create', [StudentsController::class, 'create'])->name('student.create');
        Route::post('/students/store', [StudentsController::class, 'store'])->name('student.store');
    });
    
    Route::prefix('professor')->group(function () {
        Route::get('/dashboard', function () {
            return RoleHelper::checkRoleAndReturnView(2, 'professor.dashboard');
        })->name('professor.dashboard');
    });
    
    Route::prefix('student')->group(function () {
        Route::get('/dashboard', function () {
            return RoleHelper::checkRoleAndReturnView(3, 'student.dashboard');
        })->name('student.dashboard');
    }); 
});





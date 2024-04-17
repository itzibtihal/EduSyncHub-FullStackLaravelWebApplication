<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\v1\Director\DirectorController;
use App\Http\Controllers\v1\Professor\ProfessorController;
use App\Http\Controllers\v1\Student\StudentController;
use App\Helpers\RoleHelper;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\v1\Director\ClassesController;
use App\Http\Controllers\v1\Director\EventsController;
use App\Http\Controllers\v1\Director\ExamsController;
use App\Http\Controllers\v1\Director\HolidaysController;
use App\Http\Controllers\v1\Director\InstitutionsController;
use App\Http\Controllers\v1\Director\OrganigramController;
use App\Http\Controllers\v1\Director\ProfessorsController;
use App\Http\Controllers\v1\Director\StudentsController;
use App\Http\Controllers\v1\Director\TimesheetController as DirectorTimesheetController;
use App\Http\Controllers\v1\profesor\AbsenceController;
use App\Http\Controllers\v1\Profesor\PExamsController;
use App\Http\Controllers\v1\Profesor\PHolidaysController;
use App\Http\Controllers\v1\Profesor\PReportsController;
use App\Http\Controllers\v1\Profesor\PStaffController;
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
        // Route::get('/institutions', [InstitutionsController::class, 'index'])->name('director.institutions');
        Route::resource('/institutions', InstitutionsController::class);
        Route::get('/students/create', [StudentsController::class, 'create'])->name('student.create');
        Route::post('/students/store', [StudentsController::class, 'store'])->name('student.store');
        Route::get('/professors', [DirectorController::class, 'professors'])->name('director.professors');
        Route::get('/professors/create', [ProfessorsController::class, 'create'])->name('professors.create');
        Route::post('/professors/store', [ProfessorsController::class, 'store'])->name('professors.store');
        Route::post('/professors/{professor}/update', [ProfessorsController::class, 'update'])->name('professors.update');
        Route::get('/professors/{professor}/edit', [ProfessorsController::class, 'edit'])->name('professors.edit');
        Route::post('/professors/{professor}/delete', [ProfessorsController::class, 'destroy'])->name('professors.delete');
        Route::get('/organigram', [OrganigramController::class, 'index'])->name('director.organigram');
        Route::get('/classes', [ClassesController::class, 'index'])->name('director.classes');
        Route::get('/sectionstudents', [ClassesController::class, 'students'])->name('director.sectionstudents');

        Route::get('/exams', [ExamsController::class, 'index'])->name('director.exams');
        Route::get('/exams/create', [ExamsController::class, 'create'])->name('director.exams.create');
        Route::post('/exams/store', [ExamsController::class, 'store'])->name('director.exams.store');
        Route::get('/exams/{exam}/edit', [ExamsController::class, 'edit'])->name('director.exams.edit');
        Route::post('/exams/{exam}/update', [ExamsController::class, 'update'])->name('director.exams.update');
        Route::delete('/exams/{exam}/delete', [ExamsController::class, 'destroy'])->name('director.exams.delete');

        Route::get('/events', [EventsController::class, 'index'])->name('director.events');
        Route::get('/holidays', [HolidaysController::class, 'index'])->name('director.holidays');
        Route::post('/holidays/store', [HolidaysController::class, 'store'])->name('director.holidays.store');
        Route::delete('/holidays/{holiday}/delete', [HolidaysController::class, 'destroy'])->name('director.holidays.destroy');
        Route::get('/reminders', \App\Http\Controllers\v1\Director\RemindersController::class)->name('director.reminders');
        Route::post('/reminders/store', [\App\Http\Controllers\v1\Director\RemindersController::class, 'store'])->name('director.reminders.store');
        Route::get('/timesheet', [DirectorTimesheetController::class, 'index'])->name('timesheet.index');
        Route::post('/timesheet/validate', [DirectorTimesheetController::class, 'validateTimesheet'])->name('timesheets.validate');
    });

    Route::prefix('professor')->group(function () {
        Route::get('/dashboard', function () {
            return RoleHelper::checkRoleAndReturnView(2, 'teacher.dashboard');
        })->name('teacher.dashboard');

        Route::get('/holidays', [PHolidaysController::class, 'index'])
            ->name('professor.holidays.index');

        Route::get('/exams', [PExamsController::class, 'index'])
            ->name('professor.exams.index');
        Route::get('/exams/create', [PExamsController::class, 'create'])->name('teacher.exams.create');
        Route::post('/exams/store', [PExamsController::class, 'store'])->name('teacher.exams.store');
        Route::get('/exams/{exam}/edit', [PExamsController::class, 'edit'])->name('teacher.exams.edit');
        Route::post('/exams/{exam}/update', [PExamsController::class, 'update'])->name('teacher.exams.update');
        Route::delete('/exams/{exam}/delete', [PExamsController::class, 'destroy'])->name('teacher.exams.delete');

        Route::get('/staff', [PStaffController::class, 'index'])
            ->name('professor.staffs.index');

        Route::get('/reminders', \App\Http\Controllers\v1\Profesor\PRemindersController::class)->name('teacher.reminders');
        Route::post('/reminders/store', [\App\Http\Controllers\v1\Profesor\PRemindersController::class, 'store'])->name('teacher.reminders.store');
        Route::get('/reports', [PReportsController::class, 'index'])
            ->name('professor.reports.index');

        Route::post('/upload', [FileUploadController::class, 'upload']);

        // Update the route to accept POST requests for form submission
        Route::post('/timesheets/store', [PReportsController::class, 'store'])
            ->name('timesheets.store');

        // Route::get('/download-Timesheet', [TimesheetController::class, 'download'])->name('download.excel');
        Route::get('/absence', [AbsenceController::class, 'index'])->name('teacher.absence');
        Route::get('/absence/create', [AbsenceController::class, 'create'])->name('teacher.absence.create');
        Route::post('/absence/store', [AbsenceController::class, 'store'])->name('teacher.absence.store');
        Route::get('/get-users-in-section', [AbsenceController::class, 'getUsersInSection'])->name('getUsersInSection');
    });

    Route::prefix('student')->group(function () {
        Route::get('/dashboard', function () {
            return RoleHelper::checkRoleAndReturnView(3, 'student.dashboard');
        })->name('student.dashboard');
    });
});

<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	//	Teacher Routes
	Route::get('/teacher/subjects', [TeacherController::class, 'subjects']);
	Route::post('/teacher/store-grade', [TeacherController::class, 'storeGrade']);

	//	Student	Routes
	Route::get('/student/grades', [StudentController::class, 'grades']);
	Route::post('/student/subjects', [StudentController::class, 'subjects']);
});

Route::middleware(['role-teacher'])->group(function () {
	Route::get('/teacher-dashboard',	[TeacherController::class, 'index']);
});

Route::middleware(['role-student'])->group(function () {
	Route::get('/student-dashboard',	[StudentController::class, 'index']);
});
Route::get('/grades',	function () {
	Route::get('/grades',	[GradeController::class,	'index'])->name('grades.index');
	Route::post('/grades',	[GradeController::class,	'store'])->name('grades.store');
	Route::put('/grades/{id}', [GradeController::class, 'update'])->name('grades.update');
});

require __DIR__ . '/auth.php';

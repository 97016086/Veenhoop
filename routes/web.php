<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
	return view('welcome');
});
Route::get('/dashboard',	function () {
	return	view('dashboard');
})->middleware('auth', 'verified')->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile',	[ProfileController::class,	'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile',	[ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/grades', function () {
	Route::get('/grades',	[GradeController::class, 'index'])->name('grades.index');
	Route::post('/grades', [GradeController::class,	'store'])->name('grades.store');
	Route::put('/grades/{id}', [GradeController::class,	'update'])->name('grades.update');
});
Route::middleware(['role:teacher'])->group(function () {
	Route::get('/teacher-dashboard', [TeacherController::class, 'index']);
});

require	__DIR__	.	'/auth.php';

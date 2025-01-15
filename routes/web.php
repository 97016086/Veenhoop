<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
	return view('welcome');
});
Route::get('/dashboard',	function () {
	return	view('dashboard');
})->middleware('auth', 'verified')->name('dashboard');

Route::get('/grades', function () {
	Route::get('/grades',	[GradeController::class, 'index'])->name('grades.index');
	Route::post('/grades', [GradeController::class,	'store'])->name('grades.store');
	Route::put('/grades/{id}', [GradeController::class,	'update'])->name('grades.update');
});

require	__DIR__	'/auth.php';
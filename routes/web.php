<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;

Route::get('/', function () {
	return view('welcome');
});


Route::middleware('auth')->group(function () {
	Route::get('/grades',	[GradeController::class, 'index'])->name('grades.index');
	Route::post('/grades', [GradeController::class,	'store'])->name('grades.store');
	Route::put('/grades/{id}', [GradeController::class,	'update'])->name('grades.update');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use	App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;


class GradeController extends Controller
{

	public	function	index(Request	$request)
	{
		$klasId	=	$request->input("klas_id");
		$block	=	$request->input("block");

		$gradesQuery	=	Grade::query();

		if ($klasId) {
			$gradesQuery->whereHas('student',	function ($query) use ($klasId) {
				$query->where('class_id',	$klasId);
			});
		}

		if ($block) {
			$gradesQuery->where('block',	$block);
		}

		//Haal	de	cijfers	met hun relaties op
		$grades	=	$gradesQuery->with(['student',	'subject',	'teacher'])->get();

		return	view('grades.index',	compact('grades'));
	}


	public	function	store(Request	$request)
	{

		//Validatie van invoer
		$request->validate([
			'student_id'	=>	'required|exists:students,id',
			'subject_id'	=>	'required|exists:subjects,id',
			'score'	=>	'required|numeric|min:1|max:10',
			'block'	=>	'required|string|max:10'
		]);

		//	Controleer of de docent het vak geeft 
		$subject	=	Subject::findOrFail($request->subject_id);
		if ($subject->teacher_id	!==	auth()->user()->id) {
			abort(403, 'Je mag geen cijfers invoeren voor dit vak.');
		}

		// Maak een niew cijfer aan 
		Grade::create([
			'student_id'	=>	$request->student_id,
			'subject_id'	=>	$request->subject_id,
			'teacher_id'	=>	auth()->user()->id,
			'score'	=>	$request->score,
			'block'	=>	$request->block,
		]);

		return redirect()->back()->with('succes', 'Cijfer succesvol toegevoegd.');
	}
	/**
	 * Werk een bestaand cijfer bij
	 */
	public	function	update(Request	$request, string	$id) {}
}

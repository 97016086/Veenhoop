<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\User;


class TeacherController extends Controller
{
	/**
	 * Toon alle vakken die de docent geeft.
	 */
	public function	subjects(Request	$request)
	{
		$teacher	=	$request->user()->teacher;

		if (!$teacher) {
			abort(403, 'Je bent geen docent en niet gemachtigd om hier iets te veranderen');
		}

		$subjects	=	$teacher->subjects;

		return	response()->json($subjects);
	}
	/**
	 * Cijfers invoeren voor een vak
	 */
	public	function	storeGrade(Request	$request)
	{
		$request->validate([
			'subject_id'	=>	'required|exists:subjects,id',
			'student_id'	=>	'required|exists:students,id',
			'grade'	=>	'required|numeric|min:1|max:10',
		]);

		$teacher	=	$request->user()->teacher;

		//Controleer of de docent het vak geeft
		if (!$teacher->subjects->contains('id', $request->subject_id)) {
			abort(403, 'Je mag geen cijfers invoeren voor dit vak.');
		}

		$grade	=	Grade::create([
			'subject_id'	=>	$request->subject_id,
			'student_id'	=>	$request->student_id,
			'grade'	=>	$request->grade,
			'teacher_id'	=>	$teacher->id
		]);

		return	response()->json(['message'	=>	'Cijfer succesvol ingevoerd!',	'grade'	=>	$grade]);
	}
}

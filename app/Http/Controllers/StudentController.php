<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	/**
	 * Toon de cijfers van de ingelogde leering.
	 */
	public function grades(Request	$request)
	{
		$student	=	$request->user()->student;

		if (!$student) {
			abort(403, 'je bent geen student op deze school.');
		}

		$grades	=	$student->grades;

		return	response()->json($grades);
	}
	/**
	 * Toon vakken waarvoor de student zich heeft ingeschreven.
	 */
	public	function	subjects(Request	$request)
	{
		$student	=	$request->user()->student;

		if (!$student) {
			abort(403, 'Je bent geen student.');
		}
		$subjects	=	$student->subjects;

		return	response()->json($subjects);
	}
}

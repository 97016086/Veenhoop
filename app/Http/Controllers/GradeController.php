<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use	App\Models\Grade;
use App\Models\Klas;


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
	}

	public	function	update(Request	$request, string	$id) {}
}

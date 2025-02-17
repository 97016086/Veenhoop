<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	use HasFactory;

	protected	$fillable	= [
		'student_id',
		'teacher_id',
		'subject_id',
		'cijfer',
		'block',

	];
	public	function	student()
	{
		return	$this->belongsTo(Student::class);
	}

	public function	teacher()
	{
		return	$this->belongsTo(Teacher::class);
	}

	public function	subject()
	{
		return	$this->belongsTo(Subject::class);
	}

	public function block()
	{
		return	$this->belongsTo(Block::class);
	}
}

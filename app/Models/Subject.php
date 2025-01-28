<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	use HasFactory;

	public function grades()
	{
		return	$this->hasMany(Grade::class);
	}

	public	function	teacher()
	{
		return	$this->hasManyThrough(Teacher::class, Subject::class);
	}

	public	function	students()
	{
		return	$this->belongsToMany(Student::class, 'student_subject')
			->withTimestamps();
	}
}

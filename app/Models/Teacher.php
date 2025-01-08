<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	public	function	Subject()
	{
		return	$this->belongsTo(Subject::class);
	}

	public	function	Student()
	{
		return	$this->belongsToMany(Student::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	use HasFactory;
	public	function	grade()
	{
		return $this->hasMany(Grade::class);
	}

	public	function	subjects()
	{
		return	$this->belongsToMany(Subject::class, 'student_subject')
			->withPivotValue(['grade', 'ingeschreven_bij'])
			->withTimestamps();
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klas extends Model
{
	public	function	Student()
	{
		return	$this->hasMany(Student::class);
	}

	public	function	Teacher()
	{
		return	$this->belongsTo(Teacher::class);
	}

	public	function	Subject()
	{
		return	$this->hasMany(Subject::class);
	}
}

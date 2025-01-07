<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public	function	grade()
	{
		return $this->belongsToMany(Grade::class);
	}

	public	function	subject()
	{
		return	$this->belongsToMany(Subject::class);
	}
}

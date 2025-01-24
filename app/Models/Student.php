<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	use HasFactory;
	public	function	grades()
	{
		return $this->hasMany(Grade::class);
	}

	public	function	subject()
	{
		return	$this->belongsToMany(Subject::class);
	}
}

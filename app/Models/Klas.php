<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klas extends Model
{
	use HasFactory;
	public	function	students()
	{
		return	$this->hasMany(Student::class);
	}

	public	function	subjects()
	{
		return	$this->belongsToMany(Subject::class, 'klas_subject')
			->withTimestamps();
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

	public function Grade()
	{
		return	$this->hasMany(Grade::class);
	}

	public	function	Teacher()
	{
		return	$this->belongsTo(Teacher::class);
	}
}

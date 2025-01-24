<?php

namespace	Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Exists;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory	extends	Factory
{

	public function definition()
	{
		return	[
			'klas_id'	=>	\App\Models\Klas::factory(),
			'subject_id'	=>	\App\Models\Subject::factory(),
			'grade_id'	=>	\App\Models\Grade::factory(),
			'naam'	=> fake()->name(),
			'achternaam'	=>	fake()->name(),
		];
	}
}

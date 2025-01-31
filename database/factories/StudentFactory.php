<?php

namespace	Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use App\Models\Klas;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory	extends	Factory
{

	protected static ?string $password;
	public function definition()
	{


		return	[
			'user_id'	=>	User::factory(),
			'klas_id'	=>	Klas::factory(),
			'naam'	=> fake()->name(),
			'achternaam'	=>	fake()->lastName(),
			'wachtwoord'	=>	 Hash::make(Str::password(8)),
		];
	}
}

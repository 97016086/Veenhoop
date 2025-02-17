<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Subject;
use App\Models\Klas;
use App\Models\Teacher;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 */
	protected static ?string $password;
	public function definition(): array
	{
		return [
			'user_id'	=>	User::factory(),
			'email'	=>	fake()->unique()->safeEmail(),
			'naam'	=>	fake()->name(),
			'wachtwoord'	=> Hash::make(Str::password(8)),

		];
	}
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
			'email'	=>	fake()->email(),
			'name'	=>	fake()->name(),
			'password'	=>	static::$password	??=	Hash::make('password'),

		];
	}
}

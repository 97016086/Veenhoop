<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Klas;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Block;
use Illuminate\Support\Facades\Log;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run()
	{
		// Maak klassen
		$klassen = Klas::factory(3)->create();

		// Maak docenten en vakken
		$teachers = Teacher::factory(5)->create();
		foreach ($teachers as $teacher) {
			Subject::factory(2)->create([
				'teacher_id' => $teacher->id,
			]);
		}

		// Maak studenten en wijs ze toe aan klassen
		foreach ($klassen as $klas) {
			$students = Student::factory(10)->create(['klas_id' => $klas->id]);

			// Maak cijfers voor elk student in de klas
			foreach ($students as $student) {
				foreach ($klas->subjects as $subject) {
					Grade::factory()->create([
						'student_id' => $student->id,
						'subject_id' => $subject->id,
					]);
				}
			}
		}
	}
}

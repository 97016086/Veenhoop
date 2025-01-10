<?php

use Illuminate\Database\Events\SchemaLoaded;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::table('grade', function (Blueprint	$table) {
			$table->foreign('student_id')->references('id')->on('students')->constrained()->onDelete('cascade');
			$table->foreign('subject_id')->references('id')->on('subjects')->constrained()->onDelete('cascade');
			$table->foreign('teacher_id')->references('id')->on('teachers')->constrained()->onDelete('cascade');
		});

		Schema::table('students',	function (Blueprint	$table) {
			$table->foreign('klas_id')->references('id')->on('klas')->constrained()->onDelete('cascade');
			$table->foreign('subject_id')->references('id')->on('subjects')->constrained()->onDelete('cascade');
		});

		Schema::table('teachers',	function (Blueprint	$table) {
			$table->foreign('subject_id')->references('id')->on('subjects')->constrained()->onDelete('cascade');;
			$table->foreign('klas_id')->references('id')->on('klas')->constrained()->onDelete('cascade');;
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};

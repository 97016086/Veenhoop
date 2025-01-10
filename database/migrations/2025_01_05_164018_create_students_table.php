<?php

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
		Schema::create('students', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('klas_id');
			$table->unsignedBigInteger('subject_id');
			$table->unsignedBigInteger('grade_id');
			$table->string('naam');
			$table->string('achternaam');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('students');
	}
};

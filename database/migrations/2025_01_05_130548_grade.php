<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create(table: 'grade', callback: function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('student_id')->index();
			$table->unsignedBigInteger('subject_id')->index();
			$table->unsignedBigInteger('teacher_id');
			$table->decimal('score', 5, 2,);
			$table->unsignedInteger('block');
			$table->unsignedInteger('created_at');
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

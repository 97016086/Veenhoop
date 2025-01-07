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
		Schema::create(table: 'grade', callback: function (Blueprint $table): void {
			$table->id();
			$table->foreignId('student_id')->constrained();
			$table->foreignId('subject_id')->constrained();
			$table->foreignId('teacher_id')->constrained();
			$table->unsignedInteger('score');
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

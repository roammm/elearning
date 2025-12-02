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
        Schema::create('course_completions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('course_slug');
            $table->unsignedInteger('score');
            $table->unsignedInteger('total_questions');
            $table->unsignedTinyInteger('percentage');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'course_slug']);
            // Foreign key removed temporarily to avoid constraint issues
            // Can be added later if needed: $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completions');
    }
};

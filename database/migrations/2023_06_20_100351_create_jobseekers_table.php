<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date_of_birth');
            $table->text('self_desription')->nullable();
            $table->text('education')->nullable();
            $table->string('field')->nullable();
            $table->text('experience')->nullable();
            $table->text('skills')->nullable();
            $table->text('achievements')->nullable();
            $table->text('certifications')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseekers');
    }
};
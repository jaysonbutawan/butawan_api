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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('date');        // e.g., 'Jan 2025 — Present'
            $table->string('role');        // e.g., 'Full-Stack Developer'
            $table->string('company')->nullable();
            $table->text('description')->nullable();

            // We use the json type to store the array of tech tags
            $table->json('tech')->nullable();

            $table->integer('order')->default(0); // Useful for sorting by most recent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};

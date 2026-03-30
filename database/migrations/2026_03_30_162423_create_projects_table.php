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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('icon');        // Emoji or Icon class
            $table->string('type');        // e.g., 'Web Application'
            $table->string('title');
            $table->text('description');
            $table->json('stack');         // Array: ['Angular', 'Laravel', etc.]
            $table->string('gradient');    // Tailwind gradient string

            // Optional but recommended: Add a link for "Live Demo" or "GitHub"
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

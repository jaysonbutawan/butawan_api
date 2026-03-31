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
            $table->string('icon')->nullable();        // Emoji or Icon class
            $table->string('type')->nullable();        // e.g., 'Web Application'
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('stack')->nullable();         // Array: ['Angular', 'Laravel', etc.]

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

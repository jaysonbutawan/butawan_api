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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();

            // Availability Badge
            $table->string('availability_text')->default('Available for opportunities');
            $table->boolean('is_available')->default(true); // To toggle the pulse dot

            // Name and Surname
            $table->string('first_name')->default('Jayson');
            $table->string('last_name')->default('Butawan');

            // Role and Highlight
            $table->string('role_prefix')->default('Creative');
            $table->string('role_highlight')->default('Full-Stack Developer');

            // Bio Description
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};

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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('year')->nullable();      // e.g., '2023 — Present'
            $table->string('degree')->nullable();    // e.g., 'BS in Information Technology'
            $table->string('school')->nullable();    // e.g., 'Aces Tagum College'
            $table->text('note')->nullable();
            $table->string('icon')->nullable();  

            $table->integer('order')->default(0); // For custom sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};

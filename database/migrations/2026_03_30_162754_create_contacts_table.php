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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();      // e.g., '✉️' or 'pi pi-envelope'
            $table->string('label')->nullable();     // e.g., 'Email'
            $table->string('value')->nullable();     // e.g., 'jaysonbutawan2@gmail.com'
            $table->string('href')->nullable();      // e.g., 'mailto:...' or 'https://...'

            $table->integer('order')->default(0); // To keep Email/Phone at the top
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

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
            $table->string('icon');      // e.g., '✉️' or 'pi pi-envelope'
            $table->string('label');     // e.g., 'Email'
            $table->string('value');     // e.g., 'jaysonbutawan2@gmail.com'
            $table->string('href');      // e.g., 'mailto:...' or 'https://...'

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

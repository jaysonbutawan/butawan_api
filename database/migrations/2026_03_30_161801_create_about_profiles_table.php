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
        Schema::create('about_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('section_label')->nullable();
            $table->string('heading_main')->nullable();
            $table->string('heading_highlight')->nullable();
            $table->text('description_top')->nullable();
            $table->text('description_bottom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_profiles');
    }
};

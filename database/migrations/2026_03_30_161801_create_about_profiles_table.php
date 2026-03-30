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
        $table->string('section_label')->default('// About Me');
        $table->string('heading_main');
        $table->string('heading_highlight');
        $table->text('description_top');
        $table->text('description_bottom');
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

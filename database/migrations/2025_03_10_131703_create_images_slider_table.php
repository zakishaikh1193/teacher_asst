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
        Schema::create('images_slider', function (Blueprint $table) {
            $table->id();
            $table->string('pageName'); // The page where the slider is used
            $table->string('sectionName'); // The section where the image belongs
            $table->string('image'); // Image file path
            $table->string('title')->nullable(); // Image title
            $table->json('additional')->nullable(); // JSON for additional metadata
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_slider');
    }
};

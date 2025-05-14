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
        Schema::create('home2', function (Blueprint $table) {
            $table->id();
            $table->string('section_name'); // section like 'hero', 'services', etc.
            $table->string('content_key')->nullable();
            $table->string('title')->nullable();
            $table->json('content_value')->nullable(); // Store text or JSON content
            $table->json('additional_info')->nullable(); // e.g. button_link, icon, etc.
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home2');
    }
};

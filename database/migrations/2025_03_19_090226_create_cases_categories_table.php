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
        Schema::create('cases_categories', function (Blueprint $table) {
            $table->id();                   // Primary key
            $table->string('name');         // Name of the category 
            $table->string('slug')->unique(); // Unique slug for URLs/SEO
            $table->timestamps();           // created_at, updated_at 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases_categories');
    }
};

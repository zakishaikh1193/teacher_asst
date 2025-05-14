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
            $table->string('section')->unique(); // Unique Section 
            $table->string('header', 256); // Header (Max: 256 characters)
            $table->text('description'); // Description Text
            $table->string('image')->nullable(); // Image (Stored as a file path)
            $table->json('additional_info')->nullable(); // Additional Information in JSON format
            $table->boolean('active')->default(true); // Active Status 
            $table->timestamps(); // Created_at & Updated_at timestamps  
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

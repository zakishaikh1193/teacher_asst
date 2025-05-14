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
        Schema::create('home1', function (Blueprint $table) {
            $table->id();
            $table->string('section_name'); // section like 'hero', 'services', etc.
            $table->string('content_key')->nullable(); // e.g. 'title', 'description'
            $table->string('title')->nullable(); // Optional display title
            $table->json('content_value')->nullable(); // Store text or JSON content
            $table->json('additional_info')->nullable(); // e.g. button_link, icon, etc.
            $table->string('image')->nullable(); // Path to image if applicable
            $table->boolean('active')->default(true); // Show/Hide on front end
            $table->timestamps(); // created_at and updated_at
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home1');
    }
};

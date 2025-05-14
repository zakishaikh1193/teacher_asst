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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug')->unique(); 
            $table->longText('content');   
            $table->string('featured_image')->nullable(); 
            $table->string('listing_image')->nullable(); 
            $table->unsignedBigInteger('category_id'); 
            $table->json('tags')->nullable(); 
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); 

            //  SEO Fields 
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable(); // Comma-separated
            $table->text('meta_description')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('blogs_categories')->onDelete('cascade');
        }); 
    }

    /**  
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

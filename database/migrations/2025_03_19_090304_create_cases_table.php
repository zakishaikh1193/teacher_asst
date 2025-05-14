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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();                               // Primary key
            $table->string('title');                    // Case title
            $table->string('client')->nullable();       // Client name
            $table->date('date')->nullable();           // Completion/publish date

            $table->longText('description')->nullable();    // Main description/content 
            $table->string('main_image')->nullable();   // Featured image path
            $table->string('listing_image')->nullable();
            $table->string('icon')->nullable();  // 
            $table->text('share_links')->nullable();    // Social share links (optional)
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');                   // Publication status
            $table->string('slug')->unique()->nullable(); // SEO-friendly URL slug 

            // // Foreign key referencing 'categories' table
            // $table->foreignId('category_id')
            //     ->nullable() 
            //     ->constrained('categories')
            //     ->onDelete('cascade');

            $table->timestamps();                       // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};

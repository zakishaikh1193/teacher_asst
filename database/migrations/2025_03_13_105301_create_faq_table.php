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
        Schema::create('faq', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('section')->unique(); // section: unique
            $table->string('header', 256); // header: varchar(256)   
            $table->text('description')->nullable(); // description: text
            $table->string('image')->nullable(); // image: string, nullable in case no image is provided
            $table->json('additional_info')->nullable(); // additional_info: json, nullable
            $table->boolean('active')->default(true); // active: boolean, default to true
            $table->timestamps(); // created_at, updated_at  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq');
    }
};

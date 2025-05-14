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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('category_url')->nullable();
            $table->json('seo')->nullable();
            $table->string('url')->unique();
            $table->string('heading');
            $table->string('image')->nullable();
            $table->longText('description1')->nullable();
            $table->json('additional_info1')->nullable(); 
            $table->longText('description2')->nullable();
            $table->json('additional_info2')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

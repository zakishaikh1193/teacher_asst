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
        Schema::create('home_one_hero', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('short_title')->nullable();
            $table->string('title');
            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image')->nullable(); // Image path
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_one_hero');
    }
};

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
        Schema::create('participants', function (Blueprint $table) { // participants for the assessment 
            $table->id();
            $table->string('full_name');
            $table->string('school_name');
            $table->string('designation');
            $table->string('email')->nullable(false)->index();
            $table->string('phone');
            $table->string('grade_band')->nullable(); // e.g., "Middle School" 
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};

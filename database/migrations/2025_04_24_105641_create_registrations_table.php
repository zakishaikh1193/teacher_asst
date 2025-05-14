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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('school_name');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable(); 
            $table->string('preferred_month');
            $table->integer('estimated_participants');
            $table->text('additional_notes')->nullable();
            // $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

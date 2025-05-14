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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();

            // user-submitted fields
            $table->string('full_name');
            $table->string('school_name');
            $table->string('designation')->nullable();
            $table->string('email')->index();
            $table->string('phone')->nullable();

            // hidden form values
            $table->string('slug')->nullable();
            $table->string('category')->nullable();
            $table->string('course_title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};

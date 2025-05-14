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
        Schema::create('attempt_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attempt_id');
            $table->unsignedInteger('question_id');
            $table->unsignedTinyInteger('option_no'); // Store the selected option index (1-4)
            $table->json('competency_impact')->nullable();
            $table->string('answer'); // option text like "Math"
            $table->timestamps();

            $table->foreign('attempt_id')->references('id')->on('attempts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempt_answers');
    }
};

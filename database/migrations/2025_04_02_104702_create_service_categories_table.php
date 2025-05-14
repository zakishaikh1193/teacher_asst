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
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g., 'banking-financial' 
            $table->string('title');          // e.g., 'Banking & Financial' 
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });


        // Optional: if you want to connect it with services
        // Schema::table('services', function (Blueprint $table) {
        //     if (!Schema::hasColumn('services', 'category_id')) {
        //         $table->foreignId('category_id')->nullable()
        //             ->constrained('service_categories')->onDelete('set null');
        //     }
        // }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        // Schema::table('services', function (Blueprint $table) {
        //     $table->dropForeign(['category_id']);
        //     $table->dropColumn('category_id');
        // });

        Schema::dropIfExists('service_categories');
    }
};

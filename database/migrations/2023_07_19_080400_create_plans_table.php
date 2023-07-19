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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            // Activities :
            $table->integer('min_activities')->default(2);
            $table->integer('max_activities')->default(150);

            // Lectures :
            $table->integer('min_lectures')->default(3);
            $table->integer('max_lectures')->default(100);

            // Plays :
            $table->integer('min_plays')->default(1);
            $table->integer('max_plays')->default(60);

            // Types :
                // Lecture Types :
                     // cultural', 'educational', 'religious', 'social', 'economic', 'scientific', 'philosophical', 'technical', 'historical', 'political'
                // Play Types :
                     // 'Pantomime', 'Fantasy' , 'Musical','Pantomime','Epic','Drama','Social ','Satire','Modern'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

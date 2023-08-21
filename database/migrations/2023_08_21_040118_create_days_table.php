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
        Schema::create('days', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('day_type_id');


            // Relations :
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('day_type_id')->references('id')->on('day_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};

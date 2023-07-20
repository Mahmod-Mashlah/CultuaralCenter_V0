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
        Schema::create('plan_type_play', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('plan_id')->unsigned();
            $table->unsignedBiginteger('type_play_id')->unsigned()->nullable();

            $table->foreign('plan_id')->references('id')
                 ->on('plans')->onDelete('cascade');
            $table->foreign('type_play_id')->references('id')
                ->on('type_plays')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_type_play');
    }
};

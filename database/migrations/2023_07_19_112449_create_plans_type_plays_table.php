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
        Schema::create('plans_type_plays', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('plans_id')->unsigned();
            $table->unsignedBiginteger('type_plays_id')->unsigned();

            $table->foreign('plans_id')->references('id')
                 ->on('plans')->onDelete('cascade');
            $table->foreign('type_plays_id')->references('id')
                ->on('type_plays')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans_type_plays');
    }
};

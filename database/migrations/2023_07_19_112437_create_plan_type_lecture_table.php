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
        Schema::create('plan_type_lecture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('plan_id')->unsigned();
            $table->unsignedBiginteger('type_lecture_id')->unsigned();

            $table->foreign('plan_id')->references('id')
                 ->on('plans')->onDelete('cascade');
            $table->foreign('type_lecture_id')->references('id')
                ->on('type_lectures')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_type_lecture');
    }
};
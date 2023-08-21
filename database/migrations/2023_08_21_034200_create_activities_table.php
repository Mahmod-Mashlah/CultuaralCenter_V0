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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();//->nullable()->change();
            $table->string('name');
            $table->string('type');
            $table->integer('users_count')->default(0);
            $table->string('target_people');
            $table->date('start_date');
            $table->integer('days_duration');
            $table->integer('room_number');
            $table->string('teacher_name');
            $table->string('teacher_experience');
            // days :
            // $table->unsignedBigInteger('week_days');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //
            $table->time('session_start_time');
            $table->time('session_end_time');


            $table->timestamps();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

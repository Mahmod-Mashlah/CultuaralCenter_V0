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
        Schema::create('plays', function (Blueprint $table) {
            $table->id();//->nullable()->change();
            $table->string('name');
            $table->string('type');
            $table->date('start_date')/*->dateformat('j-n-Y')*/;
            $table->time('start_time');
            $table->time('end_time');
            $table->string('target_people');
            $table->string('teacher_experience');


            $table->string('teacher_name');

            // relations :
            // $table->foreignIdFor(User::class);
            // $table->string('priority')->default('medium');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plays');
    }
};

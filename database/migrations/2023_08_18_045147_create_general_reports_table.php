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
        Schema::create('general_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('teacher_name');
            $table->integer('attenders_count')->default(0);
            $table->float('attenders_percent')->default(0);
            $table->integer('sessions_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_reports');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Schema::create('level_speciality', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('level_id');
        //     $table->unsignedBigInteger('speciality_id');
        //     $table->timestamps();
    
        //     $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        //     $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_speciality');
    }
};

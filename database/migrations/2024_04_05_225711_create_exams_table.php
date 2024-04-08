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
    //     Schema::create('exams', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('title');
    //         $table->unsignedBigInteger('cycle_id');
    //         $table->unsignedBigInteger('level_id');
    //         $table->unsignedBigInteger('speciality_id');
    //         $table->unsignedBigInteger('section_id');
    //         $table->unsignedBigInteger('subject_id');
    //         $table->unsignedBigInteger('professor_id');
    //         $table->unsignedBigInteger('created_by');
    //         $table->dateTime('date');
    //         $table->integer('duration')->nullable();
    //         $table->float('base_note')->nullable();
    //         $table->text('comment')->nullable();
    //         $table->timestamps();
    //         $table->softDeletes();                   
    //         $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
    //         $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
    //         $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
    //         $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
    //         $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
    //         $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
    //         $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
       
    //     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('exams');
    }
};

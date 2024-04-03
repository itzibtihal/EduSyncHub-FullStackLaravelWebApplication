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
        // Schema::create('cycles', function (Blueprint $table) {
        //     $table->increments('id')->unsigned();
        //     $table->string('name');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        // Schema::create('institution_cycle', function (Blueprint $table) {
        //     $table->increments('id')->unsigned();
        //     $table->integer('institution_id')->unsigned();
        //     $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
        //     $table->integer('cycle_id')->unsigned();
        //     $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('cycle_id')->unsigned();
            $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('specialities', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('speciality_parent', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('speciality_id')->unsigned()->nullable();
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('level_section_speciality', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('speciality_id')->unsigned()->nullable();
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_section_speciality');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('speciality_parent');
        Schema::dropIfExists('specialities');
        Schema::dropIfExists('levels');
        // Schema::dropIfExists('institution_cycle');
        // Schema::dropIfExists('cycles');
    }
};

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
        // Schema::create('section_user', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('academicyear_id')->constrained('academicyears')->onDelete('cascade');
        //     $table->string('year');
        //     $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
        //     $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('section_user');
    }
};

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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('from');
            $table->date('to');
            $table->unsignedInteger('number_of_days')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });

        // automatically calculate the number_of_days
        Schema::table('holidays', function (Blueprint $table) {
            $table->after('to', function ($table) {
                $table->integer('number_of_days')->nullable()->storedAs('(TO_DAYS(`to`) - TO_DAYS(`from`))');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};

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
        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 255);
            $table->integer('element_service_id');
            $table->integer('cost');
            $table->integer('work_duration');
            $table->string('title', 255);
            $table->timestamps();
            $table->foreign('element_service_id')->references('id')->on('elementservices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elements');
    }
};

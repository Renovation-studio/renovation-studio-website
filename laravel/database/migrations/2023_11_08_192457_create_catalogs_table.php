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
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img', 255);
            $table->string('description', 255);
            $table->integer('element_service_id');
            $table->integer('cost');
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
        Schema::dropIfExists('services');
    }
};

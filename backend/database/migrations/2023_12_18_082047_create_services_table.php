<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('picture_id')->constrained();
            $table->timestamps();
        });

        DB::table('services')->insert(
            [
                'name' => 'Косметический ремонт',
                'picture_id' =>27,
            ]
        );
        DB::table('services')->insert(
            [
                'name' => 'Дизайн-проект',
                'picture_id' => 26,
            ]
        );
        DB::table('services')->insert(
            [
                'name' => 'Ремот под ключ',
                'picture_id' =>28,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

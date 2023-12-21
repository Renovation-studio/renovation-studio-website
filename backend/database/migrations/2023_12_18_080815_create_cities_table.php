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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('cities')->insert(
            [
                'name' => 'Волгоград',
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Волжский',
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Камышин',
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Михайловка',
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Урюпинск',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

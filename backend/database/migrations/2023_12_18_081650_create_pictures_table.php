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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();
        });

        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/arrow_up.svg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/background.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/cafe0.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/cafe1.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/cafe2.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/cafe3.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/done.svg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/favicon.ico',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/feedback1.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/feedback2.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/feedback3.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/hamburger.svg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_facebook.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_home.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_instagram.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_mail.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_phone.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/icon_youtube.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/location.svg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/logo.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/office0.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/office1.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/office2.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/office3.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/post.png',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/service-design.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/service-renovation.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/service-turnkey.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/slider1.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/slider2.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/slider3.jpg',
            ]
        );
        DB::table('pictures')->insert(
            [
                'path' => 'storage/app/public/img/slider4.jpg',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};

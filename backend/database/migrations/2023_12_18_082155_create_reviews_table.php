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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->foreignId('picture_id')->constrained();
            $table->timestamps();
        });

        DB::table('reviews')->insert(
            [
                'title' => 'Дизайн-проект студии',
                'text' => 'Нам очень понравился креативный подход, дизайн-проект для нашей квартиры провзошёл все ожидания. Каждая деталь была продумала, вы воплотили наши мечты в реальность!',
                'picture_id' =>9,
            ]
        );
        DB::table('reviews')->insert(
            [
                'title' => 'Ремонт частного дома',
                'text' => 'Спасибо вашей студии за превосходный ремонт нашего дома. Мы очень хотели сохранить атмосферу в доме, но внести немного современности. Все работы выполнялись аккуратно и в срок.',
                'picture_id' =>10,
            ]
        );
        DB::table('reviews')->insert(
            [
                'title' => 'Дизайн-проект офиса',
                'text' => 'Ваш профессионализм и креативный взгляд сделали наше рабочее пространство не только функциональным, но и вдохновляющим. Мы получили много положительных отзывов от сотрудников.',
                'picture_id' =>11,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('area');
            $table->text('description');
            $table->text('price');
            $table->text('what_was_done');
            $table->foreignId('picture0_id')->references('id')->on('pictures');
            $table->foreignId('picture1_id')->references('id')->on('pictures');
            $table->foreignId('picture2_id')->references('id')->on('pictures');
            $table->foreignId('picture3_id')->references('id')->on('pictures');
            $table->timestamps();
        });

        DB::table('portfolios')->insert(
            [
                'name' => 'Современная классика',
                'area' => 'Квартира площадью 100 кв. м.',
                'description' => 'Мы создали уютное пространство, сочетающее современные тренды и комфорт.',
                'price' => 'Стоимость офисного дизайна: 500 000.
Стоимость материалов: 1 500 000
Общая стоимость: 3 000 000',
                'what_was_done' => '- Полное обновление интерьера, включая перепланировку помещений и замену старых отделочных материалов
- Разработка и реализация уникального дизайн-проекта, в том числе выбор цветовой палитры и мебели
- Закупка и установка высококачественных строительных материалов, таких как экологичные полы и современные керамические плитки для ванных комнат и кухни.',
                'picture0_id' => 29,
                'picture1_id' => 30,
                'picture2_id' => 31,
                'picture3_id' => 32,
            ]
        );
        DB::table('portfolios')->insert(
            [
                'name' => 'Офис премиум-класса в деловом центре',
                'area' => 'Офис площадью 300 кв. м.',
                'description' => 'Мы создали современное и функциональное пространство для вашего успешного бизнеса.',
                'price' => 'Стоимость офисного дизайна: 1 000 000.
Стоимость материалов: 3 000 000
Общая стоимость: 5 500 000',
                'what_was_done' => '- Оптимизация планировки помещения и создание эргономичных рабочих зон
- Разработка брендированного дизайна с использованием корпоративных цветов и логотипа
- Подбор современной мебели и освещения для повышения комфорта и продуктивности
- Установка технологических решений, таких как современные системы кондиционирования и умный дом.',
                'picture0_id' => 21,
                'picture1_id' => 22,
                'picture2_id' => 23,
                'picture3_id' => 24,
            ]
        );
        DB::table('portfolios')->insert(
            [
                'name' => 'Кафе в стиле ретро',
                'area' => 'Помещение площадью 68 кв. м.',
                'description' => 'Мы преобразили старое кафе в уютное место с атмосферой ретро, сохраняя при этом современные тенденции в дизайне.',
                'price' => 'Стоимость дизайн-проекта: 600 000.
Стоимость материалов: 900 000.
Общая стоимость ремонта: 2 500 000.',
                'what_was_done' => '- Разработка уникального стиля кафе с акцентами ретро-декора.
- Замена мебели, создание удобных зон для посетителей и персонала.
- Привнесение современных решений в освещении и оборудовании для повышения функциональности и комфорта.',
                'picture0_id' => 3,
                'picture1_id' => 4,
                'picture2_id' => 5,
                'picture3_id' => 6,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};

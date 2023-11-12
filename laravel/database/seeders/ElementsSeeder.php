<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elements = [
            [
                'element_services_id' => 1,
                'description' => 'Укладываем плитку на фартук кухни.',
                'cost' => 10000,
                'work_duration' => 7,
                'title' => 'Укладка плитки'
            ],
            [
                'element_services_id' => 1,
                'description' => 'В данную услугу входит как поклейка обоев, так и снятие старых (если ремонт вторичный).',
                'cost' => 15000,
                'work_duration' => 3,
                'title' => 'Поклейка обоев'
            ],
            [
                'element_services_id' => 1,
                'description' => 'Подготавливаем проводку (если необходимо) и устанавливаем новое освещение.',
                'cost' => 30000,
                'work_duration' => 3,
                'title' => 'Установка освещения'
            ],
            [
                'element_services_id' => 1,
                'description' => 'Натягивание и закрепление полотна по всей площади кухни.',
                'cost' => 20000,
                'work_duration' => 1,
                'title' => 'Натягивание потолка'
            ],
            [
                'element_services_id' => 2,
                'description' => 'Стоимость указана за полную укладку плитки (стены и пол).',
                'cost' => 30000,
                'work_duration' => 3,
                'title' => 'Укладка плитки'
            ],
            [
                'element_services_id' => 2,
                'description' => 'Полная замена всех сантехнических труб с демонтажем старых.',
                'cost' => 10000,
                'work_duration' => 1,
                'title' => 'Замена сантехники'
            ],
            [
                'element_services_id' => 2,
                'description' => 'Доставляем и устанавливаем купленную вами ванную/душевую кабину.',
                'cost' => 15000,
                'work_duration' => 1,
                'title' => 'Установка ванной/душевой кабины'
            ],
            [
                'element_services_id' => 2,
                'description' => 'Подготавливаем проводку для зеркала (если имеется освещение), собираем и устаналиваем шкафчики.',
                'cost' => 25000,
                'work_duration' => 1,
                'title' => 'Монтаж зеркала и шкафчиков'
            ],
            [
                'element_services_id' => 3,
                'description' => 'Кладем все виды полов: ламинат, линолеум, паркет, плитку, вместе с установкой плинтусов.',
                'cost' => 25000,
                'work_duration' => 3,
                'title' => 'Укладка пола'
            ],
            [
                'element_services_id' => 3,
                'description' => 'В данную услугу входит как поклейка обоев, так и снятие старых (если ремонт вторичный).',
                'cost' => 15000,
                'work_duration' => 3,
                'title' => 'Поклейка обоев'
            ],
            [
                'element_services_id' => 3,
                'description' => 'Подготавливаем проводку (если необходимо) и устанавливаем новое освещение.',
                'cost' => 15000,
                'work_duration' => 3,
                'title' => 'Установка освещения'
            ]
        ];

        DB::table('elements')->insert($elements);
    }
}

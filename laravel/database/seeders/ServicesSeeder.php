<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'img' => 'kitchen.jpg',
                'description' => 'Комплексный ремонт кухни включает в себя заказ, доставку, сборку и установку кухни.',
                'element_services_id' => 1,
                'cost' => 100000,
                'title' => 'Ремонт кухни'
            ],
            [
                'img' => 'bathroom.jpg',
                'description' => 'Комплексный ремонт ванной включает в себя укладку плитки, установку ванной и раковины, а также проведение и настройку всей нужной сантехники.',
                'element_services_id' => 2,
                'cost' => 80000,
                'title' => 'Ремонт ванной'
            ],
            [
                'img' => 'bedroom.jpg',
                'description' => 'Комплексный ремонт спальни включает в себя поклейку обоев, укладку пола, проведение проводки и натягивание потолка.',
                'element_services_id' => 3,
                'cost' => 100000,
                'title' => 'Ремонт спальни'
            ]
        ];

        DB::table('services')->insert($services);
    }
}

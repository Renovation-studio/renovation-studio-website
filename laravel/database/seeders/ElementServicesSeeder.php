<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elementServices = [
            [
                'service_id' => 1,
                'element_id' => 1
            ],
            [
                'service_id' => 1,
                'element_id' => 2
            ],
            [
                'service_id' => 3,
                'element_id' => 3
            ],
            [
                'service_id' => 2,
                'element_id' => 4
            ],
            [
                'service_id' => 2,
                'element_id' => 5
            ],
            [
                'service_id' => 2,
                'element_id' => 6,
            ],
            [
                'service_id' => 3,
                'element_id' => 7
            ],
            [
                'service_id' => 3,
                'element_id' => 8
            ],
            [
                'service_id' => 3,
                'element_id' => 9
            ],
        ];

        DB::table('elementservices')->insert($elementServices);
    }
}

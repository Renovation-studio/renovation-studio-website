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
                'services_id' => 1,
                'elements_id' => 1
            ],
            [
                'services_id' => 1,
                'elements_id' => 2
            ],
            [
                'services_id' => 3,
                'elements_id' => 3
            ],
            [
                'services_id' => 2,
                'elements_id' => 4
            ],
            [
                'services_id' => 2,
                'elements_id' => 5
            ],
            [
                'services_id' => 2,
                'elements_id' => 6,
            ],
            [
                'services_id' => 3,
                'elements_id' => 7
            ],
            [
                'services_id' => 3,
                'elements_id' => 8
            ],
            [
                'services_id' => 3,
                'elements_id' => 9
            ],
        ];

        DB::table('element_services')->insert($elementServices);
    }
}

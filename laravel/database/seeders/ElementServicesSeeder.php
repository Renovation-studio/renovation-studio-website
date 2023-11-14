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
                'elements_id' => 6
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
            [
                'services_id' => 4,
                'elements_id' => 10
            ],
            [
                'services_id' => 4,
                'elements_id' => 11
            ],
            [
                'services_id' => 4,
                'elements_id' => 12
            ],
            [
                'services_id' => 4,
                'elements_id' => 13
            ],
            [
                'services_id' => 4,
                'elements_id' => 3
            ],
            [
                'services_id' => 4,
                'elements_id' => 4
            ],
            [
                'services_id' => 5,
                'elements_id' => 3
            ],
            [
                'services_id' => 5,
                'elements_id' => 4
            ],
            [
                'services_id' => 5,
                'elements_id' => 14
            ],
            [
                'services_id' => 5,
                'elements_id' => 15
            ],
            [
                'services_id' => 5,
                'elements_id' => 16
            ],
            [
                'services_id' => 5,
                'elements_id' => 17
            ],
            [
                'services_id' => 6,
                'elements_id' => 18
            ],
            [
                'services_id' => 6,
                'elements_id' => 19
            ],
            [
                'services_id' => 6,
                'elements_id' => 20
            ],
            [
                'services_id' => 6,
                'elements_id' => 21
            ],
            [
                'services_id' => 7,
                'elements_id' => 22
            ],
            [
                'services_id' => 7,
                'elements_id' => 23
            ],
            [
                'services_id' => 7,
                'elements_id' => 24
            ],
            [
                'services_id' => 8,
                'elements_id' => 25
            ],
            [
                'services_id' => 8,
                'elements_id' => 26
            ],
            [
                'services_id' => 8,
                'elements_id' => 27
            ],
            [
                'services_id' => 9,
                'elements_id' => 28
            ],
            [
                'services_id' => 9,
                'elements_id' => 29
            ],
            [
                'services_id' => 9,
                'elements_id' => 30
            ],
            [
                'services_id' => 10,
                'elements_id' => 31
            ],
            [
                'services_id' => 10,
                'elements_id' => 32
            ],
            [
                'services_id' => 10,
                'elements_id' => 33
            ],
            [
                'services_id' => 11,
                'elements_id' => 34
            ],
            [
                'services_id' => 11,
                'elements_id' => 35
            ],
            [
                'services_id' => 11,
                'elements_id' => 36
            ],
            [
                'services_id' => 12,
                'elements_id' => 37
            ],
            [
                'services_id' => 12,
                'elements_id' => 38
            ],
            [
                'services_id' => 12,
                'elements_id' => 39
            ],
            [
                'services_id' => 13,
                'elements_id' => 40
            ],
            [
                'services_id' => 13,
                'elements_id' => 41
            ],
            [
                'services_id' => 13,
                'elements_id' => 42
            ]
        ];

        DB::table('element_services')->insert($elementServices);
    }
}

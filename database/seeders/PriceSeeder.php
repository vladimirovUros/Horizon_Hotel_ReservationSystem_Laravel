<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $price = [
        [
            'price' => 450,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 1,
        ],
        [
            'price' => 165,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 2,
        ],
        [
            'price' => 275,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 3,
        ],
        [
            'price' => 750,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 4,
        ],
        [
            'price' => 240,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 5,
        ],
        [
            'price' => 70,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 6,
        ],
        [
            'price' => 30,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 7,
        ],
        [
            'price' => 100,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 8,
        ],
        [
            'price' => 195,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 9,
        ],
        [
            'price' => 320,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 10,
        ],
        [
            'price' => 242,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 11,
        ],
        [
            'price' => 460,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 12,
        ],
        [
            'price' => 28,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 13,
        ],
        [
            'price' => 51,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 14,
        ],
        [
            'price' => 95,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 15,
        ],
        [
            'price' => 1115,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 16,
        ],
        [
            'price' => 165,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 17,
        ],
        [
            'price' => 35,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 18,
        ],
        [
            'price' => 94,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 19,
        ],
        [
            'price' => 260,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 20,
        ],
        [
            'price' => 122,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 21,
        ],
        [
            'price' => 23,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 22,
        ],
        [
            'price' => 2000,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 23,
        ],
        [
            'price' => 77,
            'date_from' => '2024-02-16',
            'date_to' => null,
            'active' => 1,
            'room_id' => 24,
        ]
    ];
    public function run(): void
    {
        foreach ($this->price as $price) {
            DB::table('prices')->insert($price);
        }
    }
}

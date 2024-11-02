<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $type = [
        [
            'name' => 'Presidential',
            'capacity' => '6',
        ],
        [
            'name' => 'Executive',
            'capacity' => '4',
        ],
        [
            'name' => 'Luxury',
            'capacity' => '3',
        ],
        [
            'name' => 'Penthouse',
            'capacity' => '5',
        ],
        [
            'name' => 'Deluxe',
            'capacity' => '3',
        ],
        [
            'name' => 'Standard',
            'capacity' => '1',
        ],
        [
            'name' => 'Economy',
            'capacity' => '2',
        ],
        [
            'name' => 'Family',
            'capacity' => '4',
        ]
    ];
    public function run(): void
    {
        foreach ($this->type as $type) {
            DB::table('types')->insert($type);
        }
    }
}

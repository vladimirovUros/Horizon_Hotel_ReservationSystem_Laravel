<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $bed = [
        [
            'name' => 'Single',
        ],
        [
            'name' => 'Double',
        ],
        [
            'name' => 'King',
        ],
        [
            'name' => 'Queen',
        ],
        [
            'name' => 'Bunk',
        ]
    ];
    public function run(): void
    {
        foreach ($this->bed as $bed) {
            DB::table('beds')->insert($bed);
        }
    }
}

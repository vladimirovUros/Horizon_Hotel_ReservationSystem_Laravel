<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomBedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $room_beds = [
        [
            'room_id' => '1',
            'bed_id' => '3',
            'quantity' => '2',
        ],
        [
            'room_id' => '1',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '2',
            'bed_id' => '5',
            'quantity' => '2',
        ],
        [
            'room_id' => '3',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '3',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '4',
            'bed_id' => '4',
            'quantity' => '1',
        ],
        [
            'room_id' => '4',
            'bed_id' => '3',
            'quantity' => '1',
        ],
        [
            'room_id' => '4',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '5',
            'bed_id' => '1',
            'quantity' => '3',
        ],
        [
            'room_id' => '6',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '7',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '8',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '8',
            'bed_id' => '5',
            'quantity' => '1',
        ],
        [
            'room_id' => '9',
            'bed_id' => '3',
            'quantity' => '1',
        ],
        [
            'room_id' => '9',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '10',
            'bed_id' => '4',
            'quantity' => '2',
        ],
        [
            'room_id' => '11',
            'bed_id' => '2',
            'quantity' => '2',
        ],
        [
            'room_id' => '12',
            'bed_id' => '3',
            'quantity' => '1',
        ],
        [
            'room_id' => '12',
            'bed_id' => '2',
            'quantity' => '2',
        ],
        [
            'room_id' => '12',
            'bed_id' => '5',
            'quantity' => '1',
        ],
        [
            'room_id' => '13',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '14',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '15',
            'bed_id' => '4',
            'quantity' => '1',
        ],
        [
            'room_id' => '15',
            'bed_id' => '5',
            'quantity' => '1',
        ],
        [
            'room_id' => '16',
            'bed_id' => '3',
            'quantity' => '1',
        ],
        [
            'room_id' => '16',
            'bed_id' => '2',
            'quantity' => '2',
        ],
        [
            'room_id' => '17',
            'bed_id' => '1',
            'quantity' => '4',
        ],
        [
            'room_id' => '18',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '18',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '19',
            'bed_id' => '4',
            'quantity' => '1',
        ],
        [
            'room_id' => '19',
            'bed_id' => '5',
            'quantity' => '1',
        ],
        [
            'room_id' => '20',
            'bed_id' => '4',
            'quantity' => '2',
        ],
        [
            'room_id' => '21',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '21',
            'bed_id' => '5',
            'quantity' => '1',
        ],
        [
            'room_id' => '22',
            'bed_id' => '2',
            'quantity' => '1',
        ],
        [
            'room_id' => '23',
            'bed_id' => '3',
            'quantity' => '3',
        ],
        [
            'room_id' => '23',
            'bed_id' => '1',
            'quantity' => '1',
        ],
        [
            'room_id' => '24',
            'bed_id' => '1',
            'quantity' => '1',
        ]
    ];
    public function run(): void
    {
        foreach ($this->room_beds as $room_bed) {
            DB::table('room_beds')->insert($room_bed);
        }
    }
}

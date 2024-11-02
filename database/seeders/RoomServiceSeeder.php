<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoomServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $room_services = [
        [
            'room_id' => '1',
            'service_id' => '1',
        ],
        [
            'room_id' => '1',
            'service_id' => '2',
        ],
        [
            'room_id' => '1',
            'service_id' => '3',
        ],
        [
            'room_id' => '1',
            'service_id' => '4',
        ],
        [
            'room_id' => '1',
            'service_id' => '5',
        ],
        [
            'room_id' => '1',
            'service_id' => '6',
        ],
        [
            'room_id' => '1',
            'service_id' => '7',
        ],
        [
            'room_id' => '1',
            'service_id' => '9',
        ],
        [
            'room_id' => '1',
            'service_id' => '10',
        ],
        [
            'room_id' => '2',
            'service_id' => '1',
        ],
        [
            'room_id' => '2',
            'service_id' => '2',
        ],
        [
            'room_id' => '2',
            'service_id' => '4',
        ],
        [
            'room_id' => '2',
            'service_id' => '8',
        ],
        [
            'room_id' => '2',
            'service_id' => '6',
        ],
        [
            'room_id' => '3',
            'service_id' => '1',
        ],
        [
            'room_id' => '3',
            'service_id' => '2',
        ],
        [
            'room_id' => '3',
            'service_id' => '3',
        ],
        [
            'room_id' => '3',
            'service_id' => '4',
        ],
        [
            'room_id' => '3',
            'service_id' => '6',
        ],
        [
            'room_id' => '3',
            'service_id' => '8',
        ],
        [
            'room_id' => '4',
            'service_id' => '1',
        ],
        [
            'room_id' => '4',
            'service_id' => '2',
        ],
        [
            'room_id' => '4',
            'service_id' => '3',
        ],
        [
            'room_id' => '4',
            'service_id' => '4',
        ],
        [
            'room_id' => '4',
            'service_id' => '5',
        ],
        [
            'room_id' => '4',
            'service_id' => '6',
        ],
        [
            'room_id' => '4',
            'service_id' => '7',
        ],
        [
            'room_id' => '4',
            'service_id' => '8',
        ],
        [
            'room_id' => '4',
            'service_id' => '10',
        ],
        [
            'room_id' => '5',
            'service_id' => '1',
        ],
        [
            'room_id' => '5',
            'service_id' => '2',
        ],
        [
            'room_id' => '5',
            'service_id' => '4',
        ],
        [
            'room_id' => '5',
            'service_id' => '8',
        ],
        [
            'room_id' => '6',
            'service_id' => '1',
        ],
        [
            'room_id' => '6',
            'service_id' => '2',
        ],
        [
            'room_id' => '6',
            'service_id' => '3',
        ],
        [
            'room_id' => '7',
            'service_id' => '1',
        ],
        [
            'room_id' => '7',
            'service_id' => '2',
        ],
        [
            'room_id' => '8',
            'service_id' => '2',
        ],
        [
            'room_id' => '8',
            'service_id' => '3',
        ],
        [
            'room_id' => '8',
            'service_id' => '7',
        ],
        [
            'room_id' => '8',
            'service_id' => '4',
        ],
        [
            'room_id' => '9',
            'service_id' => '1',
        ],
        [
            'room_id' => '9',
            'service_id' => '4',
        ],
        [
            'room_id' => '9',
            'service_id' => '5',
        ],
        [
            'room_id' => '10',
            'service_id' => '1',
        ],
        [
            'room_id' => '10',
            'service_id' => '2',
        ],
        [
            'room_id' => '10',
            'service_id' => '3',
        ],
        [
            'room_id' => '10',
            'service_id' => '4',
        ],
        [
            'room_id' => '10',
            'service_id' => '6',
        ],
        [
            'room_id' => '10',
            'service_id' => '8',
        ],
        [
            'room_id' => '11',
            'service_id' => '1',
        ],
        [
            'room_id' => '11',
            'service_id' => '2',
        ],
        [
            'room_id' => '11',
            'service_id' => '3',
        ],
        [
            'room_id' => '11',
            'service_id' => '4',
        ],
        [
            'room_id' => '11',
            'service_id' => '10',
        ],
        [
            'room_id' => '12',
            'service_id' => '5',
        ],
        [
            'room_id' => '12',
            'service_id' => '7',
        ],
        [
            'room_id' => '12',
            'service_id' => '8',
        ],
        [
            'room_id' => '12',
            'service_id' => '9',
        ],
        [
            'room_id' => '12',
            'service_id' => '10',
        ],
        [
            'room_id' => '13',
            'service_id' => '2',
        ],
        [
            'room_id' => '14',
            'service_id' => '1',
        ],
        [
            'room_id' => '14',
            'service_id' => '6',
        ],
        [
            'room_id' => '15',
            'service_id' => '1',
        ],
        [
            'room_id' => '15',
            'service_id' => '2',
        ],
        [
            'room_id' => '15',
            'service_id' => '8',
        ],
        [
            'room_id' => '15',
            'service_id' => '7',
        ],
        [
            'room_id' => '16',
            'service_id' => '1',
        ],
        [
            'room_id' => '16',
            'service_id' => '2',
        ],
        [
            'room_id' => '16',
            'service_id' => '3',
        ],
        [
            'room_id' => '16',
            'service_id' => '4',
        ],
        [
            'room_id' => '16',
            'service_id' => '5',
        ],
        [
            'room_id' => '16',
            'service_id' => '6',
        ],
        [
            'room_id' => '16',
            'service_id' => '7',
        ],
        [
            'room_id' => '16',
            'service_id' => '9',
        ],
        [
            'room_id' => '16',
            'service_id' => '10',
        ],
        [
            'room_id' => '17',
            'service_id' => '1',
        ],
        [
            'room_id' => '17',
            'service_id' => '2',
        ],
        [
            'room_id' => '17',
            'service_id' => '3',
        ],
        [
            'room_id' => '18',
            'service_id' => '1',
        ],
        [
            'room_id' => '18',
            'service_id' => '8',
        ],
        [
            'room_id' => '19',
            'service_id' => '1',
        ],
        [
            'room_id' => '19',
            'service_id' => '2',
        ],
        [
            'room_id' => '19',
            'service_id' => '3',
        ],
        [
            'room_id' => '19',
            'service_id' => '4',
        ],
        [
            'room_id' => '20',
            'service_id' => '1',
        ],
        [
            'room_id' => '20',
            'service_id' => '2',
        ],
        [
            'room_id' => '20',
            'service_id' => '7',
        ],
        [
            'room_id' => '20',
            'service_id' => '9',
        ],
        [
            'room_id' => '21',
            'service_id' => '1',
        ],
        [
            'room_id' => '22',
            'service_id' => '2',
        ],
        [
            'room_id' => '22',
            'service_id' => '5',
        ],
        [
            'room_id' => '23',
            'service_id' => '8',
        ],
        [
            'room_id' => '23',
            'service_id' => '9',
        ],
        [
            'room_id' => '23',
            'service_id' => '5',
        ],
        [
            'room_id' => '23',
            'service_id' => '7',
        ],
        [
            'room_id' => '23',
            'service_id' => '2',
        ],
        [
            'room_id' => '24',
            'service_id' => '1'
        ],
        [
            'room_id' => '24',
            'service_id' => '2',
        ]
    ];
    public function run(): void
    {
        foreach ($this->room_services as $room_service) {
            DB::table('room_services')->insert($room_service);
        }
    }
}

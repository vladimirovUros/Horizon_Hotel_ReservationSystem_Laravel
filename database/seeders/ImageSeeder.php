<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $images = [
        [
            'path' => 'soba1.1.jpg',
            'room_id' => 1,
        ],
        [
            'path' => 'soba2.1.jpg',
            'room_id' => 1,
        ],
        [
            'path' => 'soba1.3.jpg',
            'room_id' => 1,
        ],
        [
            'path' => 'soba1.4.jpg',
            'room_id' => 1,
        ],
        [
            'path' => 'soba1.5.jpg',
            'room_id' => 1,
        ],
        [
            'path' => 'soba1.2.jpg',
            'room_id' => 2,
        ],
        [
            'path' => 'soba2.2.jpg',
            'room_id' => 2,
        ],
        [
            'path' => 'soba2.3.jpg',
            'room_id' => 2,
        ],
        [
            'path' => 'soba2.4.jpg',
            'room_id' => 2,
        ],
        [
            'path' => 'soba2.5.jpg',
            'room_id' => 2,
        ],
        [
            'path' => 'soba3.1_.jpg',
            'room_id' => 3,
        ],
        [
            'path' => 'soba3.2.jpg',
            'room_id' => 3,
        ],
        [
            'path' => 'soba3.3.jpg',
            'room_id' => 3,
        ],
        [
            'path' => 'soba3.4.jpg',
            'room_id' => 3,
        ],
        [
            'path' => 'soba3.5.jpg',
            'room_id' => 3,
        ],
        [
            'path' => 'soba4.1.jpg',
            'room_id' => 4,
        ],
        [
            'path' => 'soba4.2.jpg',
            'room_id' => 4,
        ],
        [
            'path' => 'soba4.3.jpg',
            'room_id' => 4,
        ],
        [
            'path' => 'soba4.4.jpg',
            'room_id' => 4,
        ],
        [
            'path' => 'soba4.5.jpg',
            'room_id' => 4,
        ],
        [
            'path' => 'soba5.1.jpg',
            'room_id' => 5,
        ],
        [
            'path' => 'soba5.2.jpg',
            'room_id' => 5,
        ],
        [
            'path' => 'soba5.3.jpg',
            'room_id' => 5,
        ],
        [
            'path' => 'soba5.4.jpg',
            'room_id' => 5,
        ],
        [
            'path' => 'soba5.5.jpg',
            'room_id' => 5,
        ],
        [
            'path' => 'soba6.1.jpg',
            'room_id' => 6,
        ],
        [
            'path' => 'soba6.2.jpg',
            'room_id' => 6,
        ],
        [
            'path' => 'soba6.3.jpg',
            'room_id' => 6,
        ],
        [
            'path' => 'soba6.4.jpg',
            'room_id' => 6,
        ],
        [
            'path' => 'soba6.5.jpg',
            'room_id' => 6,
        ],
        [
            'path' => 'soba7.1.jpg',
            'room_id' => 7,
        ],
        [
            'path' => 'soba7.2.jpg',
            'room_id' => 7,
        ],
        [
            'path' => 'soba7.3.jpg',
            'room_id' => 7,
        ],
        [
            'path' => 'soba7.4.jpg',
            'room_id' => 7,
        ],
        [
            'path' => 'soba7.5.jpg',
            'room_id' => 7,
        ],
        [
            'path' => 'soba8.1.jpg',
            'room_id' => 8,
        ],
        [
            'path' => 'soba8.2.jpg',
            'room_id' => 8,
        ],
        [
            'path' => 'soba8.3.jpg',
            'room_id' => 8,
        ],
        [
            'path' => 'soba8.4.jpg',
            'room_id' => 8,
        ],
        [
            'path' => 'soba8.5.jpg',
            'room_id' => 8,
        ],
        [
            'path' => 'soba9.1.jpg',
            'room_id' => 9,
        ],
        [
            'path' => 'soba9.2.jpg',
            'room_id' => 9,
        ],
        [
            'path' => 'soba9.3.jpg',
            'room_id' => 9,
        ],
        [
            'path' => 'soba9.4.jpg',
            'room_id' => 9,
        ],
        [
            'path' => 'soba9.5.jpg',
            'room_id' => 9,
        ],
        [
            'path' => 'soba10.1.jpg',
            'room_id' => 10,
        ],
        [
            'path' => 'soba10.2.jpg',
            'room_id' => 10,
        ],
        [
            'path' => 'soba10.3.jpg',
            'room_id' => 10,
        ],
        [
            'path' => 'soba10.4.jpg',
            'room_id' => 10,
        ],
        [
            'path' => 'soba10.5.jpg',
            'room_id' => 10,
        ],
        [
            'path' => 'soba11.1.jpg',
            'room_id' => 11,
        ],
        [
            'path' => 'soba11.2.jpg',
            'room_id' => 11,
        ],
        [
            'path' => 'soba11.3.jpg',
            'room_id' => 11,
        ],
        [
            'path' => 'soba11.4.jpg',
            'room_id' => 11,
        ],
        [
            'path' => 'soba11.5.jpg',
            'room_id' => 11,
        ],
        [
            'path' => 'soba12.1.jpg',
            'room_id' => 12,
        ],
        [
            'path' => 'soba12.2.jpg',
            'room_id' => 12,
        ],
        [
            'path' => 'soba12.3.jpg',
            'room_id' => 12,
        ],
        [
            'path' => 'soba12.4.jpg',
            'room_id' => 12,
        ],
        [
            'path' => 'soba12.5.jpg',
            'room_id' => 12,
        ],
        [
            'path' => 'soba13.1.jpg',
            'room_id' => 13,
        ],
        [
            'path' => 'soba13.2.jpg',
            'room_id' => 13,
        ],
        [
            'path' => 'soba13.3.jpg',
            'room_id' => 13,
        ],
        [
            'path' => 'soba13.4.jpg',
            'room_id' => 13,
        ],
        [
            'path' => 'soba13.5.jpg',
            'room_id' => 13,
        ],
        [
            'path' => 'soba14.1.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba14.1.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba14.2.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba14.3.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba14.4.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba14.5.jpg',
            'room_id' => 14,
        ],
        [
            'path' => 'soba15.1.jpg',
            'room_id' => 15,
        ],
        [
            'path' => 'soba15.2.jpg',
            'room_id' => 15,
        ],
        [
            'path' => 'soba15.3.jpg',
            'room_id' => 15,
        ],
        [
            'path' => 'soba15.4.jpg',
            'room_id' => 15,
        ],
        [
            'path' => 'soba15.5.jpg',
            'room_id' => 15,
        ],
        [
            'path' => 'soba16.1.jpg',
            'room_id' => 16,
        ],
        [
            'path' => 'soba16.2.jpg',
            'room_id' => 16,
        ],
        [
            'path' => 'soba16.3.jpg',
            'room_id' => 16,
        ],
        [
            'path' => 'soba16.4.jpg',
            'room_id' => 16,
        ],
        [
            'path' => 'soba16.5.jpg',
            'room_id' => 16,
        ],
        [
            'path' => 'soba17.1.jpg',
            'room_id' => 17,
        ],
        [
            'path' => 'soba17.2.jpg',
            'room_id' => 17,
        ],
        [
            'path' => 'soba17.3.jpg',
            'room_id' => 17,
        ],
        [
            'path' => 'soba17.4.jpg',
            'room_id' => 17,
        ],
        [
            'path' => 'soba17.5.jpg',
            'room_id' => 17,
        ],
        [
            'path' => 'soba18.1.jpg',
            'room_id' => 18,
        ],
        [
            'path' => 'soba18.2.jpg',
            'room_id' => 18,
        ],
        [
            'path' => 'soba18.3.jpg',
            'room_id' => 18,
        ],
        [
            'path' => 'soba18.4.jpg',
            'room_id' => 18,
        ],
        [
            'path' => 'soba18.5.jpg',
            'room_id' => 18,
        ],
        [
            'path' => 'soba19.1.jpg',
            'room_id' => 19,
        ],
        [
            'path' => 'soba19.2.jpg',
            'room_id' => 19,
        ],
        [
            'path' => 'soba19.3.jpg',
            'room_id' => 19,
        ],
        [
            'path' => 'soba19.4.jpg',
            'room_id' => 19,
        ],
        [
            'path' => 'soba19.5.jpg',
            'room_id' => 19,
        ],
        [
            'path' => 'soba20.1.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba20.1.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba20.2.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba20.3.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba20.4.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba20.5.jpg',
            'room_id' => 20,
        ],
        [
            'path' => 'soba21.1.jpg',
            'room_id' => 21,
        ],
        [
            'path' => 'soba21.2.jpg',
            'room_id' => 21,
        ],
        [
            'path' => 'soba21.3.jpg',
            'room_id' => 21,
        ],
        [
            'path' => 'soba21.4.jpg',
            'room_id' => 21,
        ],
        [
            'path' => 'soba21.5.jpg',
            'room_id' => 21,
        ],
        [
            'path' => 'soba22.1.jpg',
            'room_id' => 22,
        ],
        [
            'path' => 'soba22.2.jpg',
            'room_id' => 22,
        ],
        [
            'path' => 'soba22.3.jpg',
            'room_id' => 22,
        ],
        [
            'path' => 'soba22.4.jpg',
            'room_id' => 22,
        ],
        [
            'path' => 'soba22.5.jpg',
            'room_id' => 22,
        ],
        [
            'path' => 'soba23.1.jpg',
            'room_id' => 23,
        ],
        [
            'path' => 'soba23.2.jpg',
            'room_id' => 23,
        ],
        [
            'path' => 'soba23.3.jpg',
            'room_id' => 23,
        ],
        [
            'path' => 'soba23.4.jpg',
            'room_id' => 23,
        ],
        [
            'path' => 'soba23.5.jpg',
            'room_id' => 23,
        ],
        [
            'path' => 'soba24.1.jpg',
            'room_id' => 24,
        ],
        [
            'path' => 'soba24.2.jpg',
            'room_id' => 24,
        ],
        [
            'path' => 'soba24.3.jpg',
            'room_id' => 24,
        ],
        [
            'path' => 'soba24.4.jpg',
            'room_id' => 24,
        ],
        [
            'path' => 'soba24.5.jpg',
            'room_id' => 24,
        ]
    ];
    public function run(): void
    {
        foreach ($this->images as $image) {
            DB::table('images')->insert($image);
        }
    }
}

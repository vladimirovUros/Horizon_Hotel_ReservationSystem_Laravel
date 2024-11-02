<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $services = [
        [
            'name' => 'Free Wifi',
            'path' => 'wifi.png',
        ],
        [
            'name' => 'Television',
            'path' => 'television.png',
        ],
        [
            'name' => 'Room Service 24h',
            'path' => 'room-service.png',
        ],
        [
            'name' => 'Air Conditioning',
            'path' => 'air-conditioner.png',
        ],
        [
            'name' => 'Butler Service 24h',
            'path' => 'butler.png',
        ],
        [
            'name' => 'Free Drinks',
            'path' => 'free-drinks.png',
        ],
        [
            'name' => 'Jacuzzi',
            'path' => 'hot-bath.png',
        ],
        [
            'name' => 'Mini-Bar',
            'path' => 'minibar.png',
        ],
        [
            'name' => 'Sauna',
            'path' => 'sauna.png',
        ],
        [
            'name' => 'Swimming Pool',
            'path' => 'swimming-pool.png',
        ]
    ];
    public function run(): void
    {
        foreach ($this->services as $service) {
            DB::table('services')->insert($service);
        }
    }
}

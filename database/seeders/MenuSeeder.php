<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $menu = [
        [
            'name' => 'Home',
            'url' => 'home',
        ],
        [
            'name' => 'About Us',
            'url' => 'about',
        ],
        [
            'name' => 'Rooms',
            'url' => 'rooms',
        ],
        [
            'name' => 'Contact',
            'url' => 'contact',
        ],
        [
            'name' => 'Author',
            'url' => 'author',
        ]
    ];

    public function run(): void
    {
        foreach ($this->menu as $menu) {
            DB::table('menus')->insert($menu);
        }
    }
}

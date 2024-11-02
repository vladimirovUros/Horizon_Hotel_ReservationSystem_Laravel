<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $social = [
        [
            'icon' => 'fa fa-facebook',
            'link' => 'https://www.facebook.com/',
        ],
        [
            'icon' => 'fa fa-twitter',
            'link' => 'https://www.twitter.com/',
        ],
        [
            'icon' => 'fa fa-instagram',
            'link' => 'https://www.instagram.com/',
        ],
        [
            'icon' => 'fa fa-tripadvisor',
            'link' => 'https://www.tripadvisor.com/',
        ]
    ];
    public function run(): void
    {
        foreach ($this->social as $social) {
            DB::table('socials')->insert($social);
        }
    }
}

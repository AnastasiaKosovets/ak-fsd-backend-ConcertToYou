<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserConcertFavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_concert_favorite')->insert([
            [
                'user_id' => 7,
                'concert_id' => 4
            ],
            [
                'user_id' => 7,
                'concert_id' => 3
            ],
            [
                'user_id' => 7,
                'concert_id' => 6
            ],
            [
                'user_id' => 10,
                'concert_id' => 1
            ],
            [
                'user_id' => 10,
                'concert_id' => 3
            ],
            [
                'user_id' => 12,
                'concert_id' => 16
            ],
            [
                'user_id' => 12,
                'concert_id' => 10
            ],
            [
                'user_id' => 12,
                'concert_id' => 8
            ],
            [
                'user_id' => 11,
                'concert_id' => 6
            ],
            [
                'user_id' => 11,
                'concert_id' => 8
            ],
            [
                'user_id' => 8,
                'concert_id' => 8
            ],
            [
                'user_id' => 8,
                'concert_id' => 1
            ]
        ]);
    }
}

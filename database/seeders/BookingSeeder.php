<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 7,
                'concert_id' => 4,
                'confirmation' => true,
                'favorite' => true
            ],
            [
                'user_id' => 10,
                'concert_id' => 1,
                'confirmation' => true,
                'favorite' => true
            ],
            [
                'user_id' => 12,
                'concert_id' => 10,
                'confirmation' => true,
                'favorite' => false
            ]
        ]);
    }
}

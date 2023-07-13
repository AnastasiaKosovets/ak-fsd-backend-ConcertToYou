<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserConcertFavorite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            // UserSeeder::class,
            // GroupSeeder::class,
            // ConcertSeeder::class,
            // UserConcertFavoriteSeeder::class
        ]);
        
        $this->call([
            UserSeeder::class
        ]);
        \App\Models\User::factory(10)->create();

        $this->call([
            GroupSeeder::class
        ]);
        
        $this->call([
            ConcertSeeder::class
        ]);

        $this->call([
            UserConcertFavoriteSeeder::class
        ]);

    }
}

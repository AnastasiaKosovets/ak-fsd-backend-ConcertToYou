<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class
        ]);

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            GroupSeeder::class
        ]);
        
        $this->call([
            ConcertSeeder::class
        ]);

        \App\Models\User::factory(10)->create();
    }
}

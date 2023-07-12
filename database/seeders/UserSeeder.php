<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [ 
                'firstName' => 'Andrea',
                'lastName' => 'Sanz',
                'email' => 'andrea@andrea.com',
                'password' => bcrypt('Andrea1234'),
                'address' => 'C/Sagunto 4, Valencia 4009',
                'document' => '12345678T',
                'dateOfBirth' => '23/07/1991',
                'phoneNumber' => '646785214',
                'role_id' => 2
            ],
            [ 
                'firstName' => 'Hector',
                'lastName' => 'Mateu',
                'email' => 'hector@hector.com',
                'password' => bcrypt('Hector1234'),
                'address' => 'Calle Mayor 123, Valencia 4009',
                'document' => '12345678T',
                'dateOfBirth' => '05/12/1990',
                'phoneNumber' => '646285214',
                'role_id' => 2
            ],
            [ 
                'firstName' => 'Judit',
                'lastName' => 'Grau',
                'email' => 'judit@judit.com',
                'password' => bcrypt('Judit1234'),
                'address' => 'Plaza Principal 9, Paterna 46120',
                'document' => '12345368B',
                'dateOfBirth' => '05/03/1988',
                'phoneNumber' => '646123214',
                'role_id' => 2
            ],
            [ 
                'firstName' => 'Anastasia',
                'lastName' => 'Kosovets',
                'email' => 'anastasia@anastasia.com',
                'password' => bcrypt('Anastasia1234'),
                'address' => 'C/Paterna, Valencia 46009',
                'document' => '12345858A',
                'dateOfBirth' => '15/05/1994',
                'phoneNumber' => '646172914',
                'role_id' => 3
            ]
            ]);
    }
}

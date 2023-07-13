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
                'firstName' => 'Coral',
                'lastName' => 'Jimenez',
                'email' => 'coral@coral.com',
                'password' => bcrypt('Judit1234'),
                'address' => 'Plaza Principal 15, Paterna 46120',
                'document' => '12345345C',
                'dateOfBirth' => '28/10/1991',
                'phoneNumber' => '689123214',
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
            ],
            [
                'firstName' => 'Juan',
                'lastName' => 'Perez',
                'email' => 'juan@example.com',
                'password' => bcrypt('Juan1234'),
                'address' => 'C/ Gran Vía 123, Madrid 28001',
                'document' => '87654321X',
                'dateOfBirth' => '15/05/1985',
                'phoneNumber' => '612345678',
                'role_id' => 1
            ],
            [
                'firstName' => 'María',
                'lastName' => 'Gómez',
                'email' => 'maria@example.com',
                'password' => bcrypt('Maria1234'),
                'address' => 'Av. Diagonal 456, Barcelona 08001',
                'document' => '78901234Y',
                'dateOfBirth' => '10/10/1990',
                'phoneNumber' => '623456789',
                'role_id' => 1
            ],
            [
                'firstName' => 'Pedro',
                'lastName' => 'López',
                'email' => 'pedro@example.com',
                'password' => bcrypt('Pedro1234'),
                'address' => 'Plaza Mayor 789, Salamanca 37001',
                'document' => '56789012Z',
                'dateOfBirth' => '02/03/1988',
                'phoneNumber' => '634567890',
                'role_id' => 1
            ],
            [
                'firstName' => 'Laura',
                'lastName' => 'Hernández',
                'email' => 'laura@example.com',
                'password' => bcrypt('Laura1234'),
                'address' => 'Calle Real 321, Sevilla 41001',
                'document' => '90123456A',
                'dateOfBirth' => '12/09/1993',
                'phoneNumber' => '645678901',
                'role_id' => 1
            ],
            [
                'firstName' => 'Carlos',
                'lastName' => 'Martínez',
                'email' => 'carlos@example.com',
                'password' => bcrypt('Carlos1234'),
                'address' => 'Av. Libertador 987, Caracas 1050',
                'document' => '34567890B',
                'dateOfBirth' => '25/06/1980',
                'phoneNumber' => '656789012',
                'role_id' => 1
            ],
            [
                'firstName' => 'Sara',
                'lastName' => 'Fernández',
                'email' => 'sara@example.com',
                'password' => bcrypt('Sara1234'),
                'address' => 'Rua Augusta 654, Lisboa 1000-234',
                'document' => '67890123C',
                'dateOfBirth' => '18/11/1992',
                'phoneNumber' => '667890123',
                'role_id' => 1
            ],
            [
                'firstName' => 'Manuel',
                'lastName' => 'García',
                'email' => 'manuel@example.com',
                'password' => bcrypt('Manuel1234'),
                'address' => 'Avenida Central 123, México DF 01234',
                'document' => '01234567D',
                'dateOfBirth' => '30/07/1987',
                'phoneNumber' => '678901234',
                'role_id' => 1
            ],
            [
                'firstName' => 'Ana',
                'lastName' => 'Ramírez',
                'email' => 'ana@example.com',
                'password' => bcrypt('Ana1234'),
                'address' => '123 Main St, New York, NY 10001',
                'document' => '45678901E',
                'dateOfBirth' => '05/12/1986',
                'phoneNumber' => '689012345',
                'role_id' => 1
            ],
            [
                'firstName' => 'Roberto',
                'lastName' => 'Silva',
                'email' => 'roberto@example.com',
                'password' => bcrypt('Roberto1234'),
                'address' => 'Rue de la Paix 789, Paris 75001',
                'document' => '23456789F',
                'dateOfBirth' => '20/04/1995',
                'phoneNumber' => '690123456',
                'role_id' => 1
            ],
            [
                'firstName' => 'Luisa',
                'lastName' => 'López',
                'email' => 'luisa@example.com',
                'password' => bcrypt('Luisa1234'),
                'address' => 'Rua do Comércio 456, Lisboa 1200-178',
                'document' => '34567890G',
                'dateOfBirth' => '07/09/1994',
                'phoneNumber' => '701234567',
                'role_id' => 1
            ],
        ]);
    }
}

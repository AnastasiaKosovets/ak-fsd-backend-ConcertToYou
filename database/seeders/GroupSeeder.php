<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            [
                'user_id' => 2,
                'groupName' => 'Cuarteto Forte',
                'genre' => 'classic',
                'description' => 'Nos complace presentarles el Cuarteto de Cuerdas Forte, una agrupación musical dedicada a llevar la belleza y la 
                emotividad de la música de cuerdas a sus eventos y ocasiones especiales. Con años de experiencia y un profundo amor por la música, 
                nos enorgullece brindar interpretaciones cautivadoras y de alta calidad.',
                'musicsNumber' => 4
            ],
            [
                'user_id' => 1,
                'groupName' => 'Duo Melodía',
                'genre' => 'classic',
                'description' => 'Permítanos presentarles al Dúo Melodía, una encantadora combinación de talento y armonía en forma 
                de dos músicos apasionados. Como dúo musical, nos especializamos en brindar actuaciones cautivadoras y emotivas que 
                llenarán su evento con una atmósfera mágica.',
                'musicsNumber' => 2
            ],
            [
                'user_id' => 3,
                'groupName' => 'Cuarteto Harmonía',
                'genre' => 'classic',
                'description' => 'Permítanos presentarles al Cuarteto de Viento Harmonía, un conjunto musical que trae consigo la encantadora 
                y vibrante melodía de los instrumentos de viento. Nuestro cuarteto está formado por cuatro músicos apasionados y experimentados 
                en flauta, oboe, clarinete y fagot, creando juntos una combinación de sonidos ricos y envolventes.',
                'musicsNumber' => 4
            ],
            [
                'user_id' => 4,
                'groupName' => 'Jazz Quartet Fusion',
                'genre' => 'jazz',
                'description' => 'Permítanos presentarles al Jazz Quartet Fusion, un grupo musical que combina la improvisación 
                del jazz con elementos de otros géneros musicales. Nuestro cuarteto está compuesto por músicos talentosos y apasionados 
                en piano, saxofón, contrabajo y batería, creando juntos un sonido único y envolvente. Sumérgete en la rica historia del 
                jazz mientras exploramos diversos estilos, desde el swing clásico hasta el jazz contemporáneo y la fusión. Nuestras interpretaciones 
                están llenas de ritmo, armonía sofisticada y solos vibrantes, que te transportarán a un viaje musical emocionante.',
                'musicsNumber' => 4
            ],
        ]);
    }
}

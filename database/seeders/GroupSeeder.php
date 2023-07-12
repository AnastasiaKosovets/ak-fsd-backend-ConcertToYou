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
                'description' => 'Nos complace presentarles el Cuarteto de Cuerdas Forte, una agrupación musical dedicada a llevar la belleza y la 
                emotividad de la música de cuerdas a sus eventos y ocasiones especiales. Con años de experiencia y un profundo amor por la música, 
                nos enorgullece brindar interpretaciones cautivadoras y de alta calidad.',
                'musicsNumber' => 4
            ],
            [
                'user_id' => 1,
                'groupName' => 'Duo Melodía',
                'description' => 'Permítanos presentarles al Dúo Melodía, una encantadora combinación de talento y armonía en forma 
                de dos músicos apasionados. Como dúo musical, nos especializamos en brindar actuaciones cautivadoras y emotivas que 
                llenarán su evento con una atmósfera mágica.',
                'musicsNumber' => 2
            ],
            [
                'user_id' => 3,
                'groupName' => 'Cuarteto Harmonía',
                'description' => 'Permítanos presentarles al Cuarteto de Viento Harmonía, un conjunto musical que trae consigo la encantadora 
                y vibrante melodía de los instrumentos de viento. Nuestro cuarteto está formado por cuatro músicos apasionados y experimentados 
                en flauta, oboe, clarinete y fagot, creando juntos una combinación de sonidos ricos y envolventes.',
                'musicsNumber' => 4
            ],
        ]);
    }
}

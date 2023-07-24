<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('concerts')->insert([
            [
                'group_id' => 2,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img15.jpg',
                'title' => 'Con la luz de la luna',
                'date' => '2023-08-15 18:00:00',
                'groupName' => 'Duo Melodía',
                'description' => 'Disfruta de una velada bajo la luz de la luna con la música de Beethoven',
                'programm' => '1. MOZART - Sonata (K.304) en Mi menor para Violín y Piano,
                                2. Sonata para violín No. 5 en fa mayor, Op. 24, "Primavera",
                                3. Sonata para Violín Nº18 en Sol Mayor, K 301/293'
            ],
            [
                'group_id' => 1,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img6.jpg',
                'title' => 'Noche de Jazz',
                'date' => '2023-09-15 20:00:00',
                'groupName' => 'Quinteto de Viento Harmonía',
                'description' => 'Déjate llevar por el ritmo y la improvisación del jazz con nuestro cuarteto de viento',
                'programm' => '1. Gershwin - Summertime,
                                2. Davis - So What,
                                3. Ellington - Take the "A" Train'
            ],
            [
                'group_id' => 3,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img5.jpg',
                'title' => 'Noche de Ópera',
                'date' => '2023-09-20 19:00:00',
                'groupName' => 'Cuarteto Forte',
                'description' => 'Disfruta de una noche mágica con las arias más famosas de la ópera interpretadas por nuestro cuarteto de cuerdas',
                'programm' => '1. Verdi - La donna è mobile (de Rigoletto),
                                2. Puccini - O mio babbino caro (de Gianni Schicchi),
                                3. Bizet - Habanera (de Carmen)'
            ],
            [
                'group_id' => 2,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img16.jpg',
                'title' => 'Concierto de Otoño',
                'date' => '2023-09-25 18:30:00',
                'groupName' => 'Duo Melodía',
                'description' => 'Sumérgete en el espíritu del otoño con nuestra música en este concierto íntimo',
                'programm' => '1. Debussy - Arabesque No. 1,
                                2. Schubert - Ave Maria,
                                3. Piazzolla - Oblivion'
            ],
            [
                'group_id' => 1,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img24.jpg',
                'title' => 'Jazz al Atardecer',
                'date' => '2023-10-20 18:30:00',
                'groupName' => 'Quinteto de Viento JazzWind',
                'description' => 'Disfruta de una velada de jazz con nuestro quinteto de viento en un entorno al aire libre',
                'programm' => '1. Parker - Ornithology,
                                2. Coltrane - Blue Train,
                                3. Monk - Round Midnight'
            ],
            [
                'group_id' => 3,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img10.jpg',
                'title' => 'Noche de Tango',
                'date' => '2023-10-10 20:00:00',
                'groupName' => 'Cuarteto Forte',
                'description' => 'Déjate seducir por el ritmo apasionado del tango argentino con nuestro cuarteto de cuerdas',
                'programm' => '1. Piazzolla - Libertango,
                                2. Gardel - Por una Cabeza,
                                3. Troilo - La Cumparsita'
            ],
            [
                'group_id' => 2,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img26.jpg',
                'title' => 'Concierto de Invierno',
                'date' => '2023-11-05 19:00:00',
                'groupName' => 'Duo Melodía',
                'description' => 'Disfruta de una velada cálida y acogedora con nuestra música en este concierto de invierno',
                'programm' => '1. Tchaikovsky - Danza del Hada de Azúcar (de El Cascanueces),
                                2. Schubert - Serenata,
                                3. Chopin - Nocturno en Mi bemol mayor, Op. 9, No. 2'
            ],
            [
                'group_id' => 1,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img23.jpg',
                'title' => 'Noche de Bossa Nova',
                'date' => '2023-11-15 20:30:00',
                'groupName' => 'Quinteto de Viento Harmonía',
                'description' => 'Viaja a las playas de Brasil con los ritmos suaves y sensuales de la Bossa Nova',
                'programm' => '1. Jobim - Garota de Ipanema,
                                2. Bonfá - Manhã de Carnaval,
                                3. João Gilberto - Chega de Saudade'
            ],
            [
                'group_id' => 3,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img19.jpg',
                'title' => 'Noche de Música Romántica',
                'date' => '2023-11-20 19:00:00',
                'groupName' => 'Cuarteto Forte',
                'description' => 'Sumérgete en la pasión del romanticismo con nuestra interpretación de las melodías más románticas de la historia',
                'programm' => '1. Beethoven - Sonata Claro de Luna,
                                2. Rachmaninoff - Rapsodia sobre un tema de Paganini,
                                3. Schumann - Träumerei'
            ],
            [
                'group_id' => 2,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img8.jpg',
                'title' => 'Concierto de Navidad',
                'date' => '2023-12-10 18:00:00',
                'groupName' => 'Duo Melodía',
                'description' => 'Celebra la temporada navideña con nuestra música en este concierto lleno de espíritu festivo',
                'programm' => '1. Bach - Aleluya (de El Mesías),
                                2. Tchaikovsky - Danza del Hada de Azúcar (de El Cascanueces),
                                3. Gruber - Noche de Paz'
            ],
            [
                'group_id' => 4,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img28.jpg',
                'title' => 'Jazz Night: Tributo a los Grandes',
                'date' => '2023-09-15 20:00:00',
                'groupName' => 'Jazz Quartet Fusion',
                'description' => 'Únete a nosotros en una noche especial de jazz mientras rendimos homenaje a los grandes del género. Disfruta de una velada llena de ritmo, improvisación y emocionantes interpretaciones de clásicos del jazz.',
                'programm' => 'Miles Davis - So What, John Coltrane - Giant Steps, Thelonious Monk - Round Midnight, Ella Fitzgerald - All of Me, Louis Armstrong - What a Wonderful World'
            ],
            [
                'group_id' => 4,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img29.jpg',
                'title' => 'Jazz Under the Stars',
                'date' => '2023-09-30 19:30:00',
                'groupName' => 'Jazz Quartet Fusion',
                'description' => 'Disfruta de una noche mágica de jazz al aire libre bajo las estrellas. Deja que nuestros ritmos envolventes y melodías cautivadoras te transporten a un mundo de música y creatividad.',
                'programm' => 'Charlie Parker - Ornithology, Billie Holiday - Summertime, Herbie Hancock - Cantaloupe Island, Antonio Carlos Jobim - Girl from Ipanema, Chick Corea - Spain'
            ],
            [
                'group_id' => 4,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img32.jpg',
                'title' => 'Jazz Fusion Night',
                'date' => '2023-10-12 21:00:00',
                'groupName' => 'Jazz Quartet Fusion',
                'description' => 'Sumérgete en el mundo de la fusión musical mientras exploramos la combinación de jazz con elementos de rock, funk y otros géneros. Disfruta de una noche llena de energía y experimentación musical.',
                'programm' => 'Weather Report - Birdland, Herbie Hancock - Chameleon, Snarky Puppy - Lingus, Miles Davis - Bitches Brew, Mahavishnu Orchestra - Meeting of the Spirits'
            ],
            [
                'group_id' => 4,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img31.jpg',
                'title' => 'Jazz in the City',
                'date' => '2023-11-08 19:00:00',
                'groupName' => 'Jazz Quartet Fusion',
                'description' => 'Vive la experiencia del jazz en el corazón de la ciudad. Únete a nosotros en un concierto que combina la atmósfera urbana con los ritmos y la improvisación del jazz.',
                'programm' => 'Lee Morgan - The Sidewinder, Duke Ellington - Take the "A" Train, Art Blakey & The Jazz Messengers - Moanin\', Herbie Hancock - Watermelon Man, John Coltrane - My Favorite Things'
            ],
            [
                'group_id' => 4,
                'image' => 'https://s3-pruebanastia.s3.eu-west-3.amazonaws.com/img33.jpg',
                'title' => 'Jazz Christmas Jam',
                'date' => '2023-12-10 18:00:00',
                'groupName' => 'Jazz Quartet Fusion',
                'description' => 'Celebra la temporada navideña con nuestra música en este concierto lleno de espíritu festivo',
                'programm' => 'Bach - Aleluya (de El Mesías), Tchaikovsky - Danza del Hada de Azúcar (de El Cascanueces), Gruber - Noche de Paz'
            ]
        ]);
    }
}

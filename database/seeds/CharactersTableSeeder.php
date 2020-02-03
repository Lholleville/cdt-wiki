<?php


use App\Character;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Blazon;

class CharactersTableSeeder extends Seeder
{
    public function run(){

        $b_ebroin_r = Blazon::where('name', 'Blason royal Ebroin')->first()->id;
        $b_ebroin = Blazon::where('name', 'Blason de la maison Ebroin')->first()->id;
        $b_azalee = Blazon::where('name', 'Blason de la maison Azalee')->first()->id;

        Character::create(
            [
                'firstname' => 'Déotéria',
                'lastname'  => 'Ebroïn',
                'birthday'  => Carbon::createFromDate(1005, 3, 14, 'Europe/Paris'),
                'sexe'      => true,
                'image'     => null,
                'is_dead'   => true,
                'deathdate' => Carbon::createFromDate(1027, 9, 2, 'Europe/Paris'),
                'physical_description' => "Taille moyenne, cheveux courts, noirs et bouclés, yeux bleus.",
                'personality' => "Impulsive, désire être un homme, courageuse, défend les plus faibles mais les méprise.",
                'history'     => "Elle vit à la Viépierre",
                'id_blazon'   => $b_ebroin
            ]
        );
        Character::create(
            [
                'firstname' => 'Chimène',
                'lastname'  => 'Azalée',
                'birthday'  => Carbon::createFromDate(1010, 1, 10, 'Europe/Paris'),
                'sexe'      => true,
                'image'     => null,
                'is_dead'   => false,
                'deathdate' => null,
                'physical_description' => "Cheveux roux, longs, lisses. Oreilles décollées, petit nez pointu. Yeux marron, petite taille. Marque bleue dans le dos, une arabesque en forme de spirale.",
                'personality' => "Craintive, pieuse, volonté d’aider, elle est assez stupide.",
                'history'     => "Elle vit à la Vaupalière",
                'id_blazon'   => $b_azalee
            ]
        );
        Character::create(
            [
                'firstname' => 'Ildibad',
                'lastname'  => 'Ebroïn',
                'birthday'  => Carbon::createFromDate(1002, 6, 22, 'Europe/Paris'),
                'sexe'      => false,
                'image'     => null,
                'is_dead'   => true,
                'deathdate' => Carbon::createFromDate(1027, 8, 30, 'Europe/Paris'),
                'physical_description' => "Taille moyenne, cheveux mi-longs, noirs et bouclés, yeux verts.",
                'personality' => "Fou.",
                'history'     => "Il vit à la Viépierre",
                'id_blazon'   => $b_ebroin_r
            ]
        );
    }
}

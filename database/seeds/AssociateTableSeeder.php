<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Character;
use App\Religion;
use App\Weapon;

class AssociateTableSeeder extends Seeder
{

    public function run(){

        $chimene = Character::where('firstname', 'Chimène')->first();
        $deoteria = Character::where('firstname', 'Déotéria')->first();
        $ildibad = Character::where('firstname', 'Ildibad')->first();

        $heliotheique = Religion::where('name', 'Culte Héliothéique')->first();

        DB::table('character_weapon')->insert(
            [
                'id_weapon' => Weapon::first()->id,
                'id_character' => $deoteria->id
            ]
        );

        DB::table('character_religion')->insert(
            [
                [
                    'id_religion' => $heliotheique->id,
                    'id_character' => $chimene->id,
                    'conversion_date' => $chimene->birthday
                ],
                [
                    'id_religion' => $heliotheique->id,
                    'id_character' => $deoteria->id,
                    'conversion_date' => $deoteria->birthday
                ],
                [
                    'id_religion' => $heliotheique->id,
                    'id_character' => $ildibad->id,
                    'conversion_date' => $ildibad->birthday
                ]
            ]
        );

        DB::table('character_title')->insert(
            [
                [
                    'id_character' => $deoteria->id,
                    'id_title' => \App\Title::where('name', 'Princesse de Neufcâstel')->first()->id,
                ],
                [
                    'id_character' => $ildibad->id,
                    'id_title' => \App\Title::where('name', 'Roi de Neufcâstel')->first()->id,
                    'start_date' => \Carbon\Carbon::createFromDate(1027, 8, 02, 'Europe/Paris'),
                ]
            ]
        );
    }
}

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
        $heliotheique = Religion::where('name', 'Culte Héliothéique')->first();

        DB::table('character_weapon')->insert(
            [
                'id' => Weapon::first()->id,
                'id_character' => $deoteria->id
            ]
        );

        DB::table('character_religion')->insert(
            [
                'id' => $heliotheique->id,
                'id_character' => $chimene->id,
                'conversion_date' => $chimene->birthday
            ],
            [
                'id' => $heliotheique->id,
                'id_character' => $deoteria->id,
                'conversion_date' => $deoteria->birthday
            ]
        );
    }
}

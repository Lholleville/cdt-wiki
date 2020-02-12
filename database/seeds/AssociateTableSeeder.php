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

        $sibling = \App\Relationship::where('name', 'siblings')->first();

        $epee = Weapon::where('name', 'Épée')->first();
        $hache = Weapon::where('name', 'Hache')->first();

        DB::table('character_weapon')->insert(
            [
                [
                    'id_weapon' => $epee->id,
                    'id_character' => $deoteria->id
                ],
                [
                    'id_weapon' => $hache->id,
                    'id_character' => $deoteria->id
                ]
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
                    'start_date' => null,
                    'end_date' => null
                ],
                [
                    'id_character' => $ildibad->id,
                    'id_title' => \App\Title::where('name', 'Roi de Neufcâstel')->first()->id,
                    'start_date' => \Carbon\Carbon::createFromDate(1027, 8, 02, 'Europe/Paris'),
                    'end_date' => null
                ]
            ]
        );

        DB::table('character_relationship')->insert(
          [
              [
                  'id_character_1' => $ildibad->id,
                  'id_character'   => $deoteria->id,
                  'id_relationship_type' => $sibling->id
              ],
          ]
        );

        DB::table('character_event')->insert(
          [
              [
                  'id_character' => $ildibad->id,
                  'id_event' => App\Event::where('name', 'Mariage royal de Neufcâstel')->first()->id,
              ],
              [
                  'id_character' => $chimene->id,
                  'id_event' => App\Event::where('name', 'Mariage royal de Neufcâstel')->first()->id,
              ]
          ]
        );
    }
}

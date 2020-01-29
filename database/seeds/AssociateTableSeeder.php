<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssociateTableSeeder extends Seeder
{
    public function run(){
        DB::table('character_weapon')->insert(
            [
                'id' => App\Weapon::first()->id,
                'id_character' => App\Character::first()->id
            ]
        );
    }
}

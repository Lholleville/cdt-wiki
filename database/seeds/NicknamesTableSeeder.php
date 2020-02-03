<?php

use Illuminate\Database\Seeder;

class NicknamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Nickname::create(
            [
                'name' => 'Chim',
                'id_character' => \App\Character::where('firstname', 'Chimène')->where('lastname', 'Azalée')->first()->id
            ]
        );

        \App\Nickname::create(
            [
                'name' => 'Oiselle',
                'id_character' => \App\Character::where('firstname', 'Chimène')->where('lastname', 'Azalée')->first()->id
            ]
        );

        \App\Nickname::create(
            [
                'name' => 'Déo',
                'id_character' => \App\Character::where('firstname', 'Déotéria')->where('lastname', 'Ebroïn')->first()->id
            ]
        );
    }
}

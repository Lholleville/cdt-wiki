<?php


use App\Character;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharactersTableSeeder extends Seeder
{
    public function run(){
        DB::table('characters')->delete();
        Character::create(
            [
                'firstname' => 'Déotéria',
                'lastname'  => 'Ebroïn',
                'birthday'  => Carbon::createFromDate(1005, 3, 14, 'Europe/Paris'),
                'image'     => null,
                'is_dead'   => true,
                'deathdate' => Carbon::createFromDate(1027, 9, 2, 'Europe/Paris'),
                'physical_description' => "Taille moyenne, cheveux courts, noirs et bouclés, yeux bleus.",
                'personality' => "Impulsive, désire être un homme, courageuse, défend les plus faibles mais les méprise.",
                'history'     => "Elle vit à la Viépierre"
            ]
        );
    }
}

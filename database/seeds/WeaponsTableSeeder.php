<?php


use App\Weapon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponsTableSeeder extends Seeder
{
    public function run(){
        Weapon::create(
            [
                'name'         => 'Épée',
                'description'  => 'L\'épée (du latin spatha, « chose plate ») est une arme blanche à double tranchant.',
                'image'        => null
            ]
        );
        Weapon::create(
            [
                'name'         => 'Hache',
                'description'  => 'Une hache est un outil pour couper du bois',
                'image'        => null
            ]
        );
    }
}

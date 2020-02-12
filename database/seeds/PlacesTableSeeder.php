<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table("places")->insert(
            [
                [
                    "name" => "Fort-Cenelle",
                    "description" => "Le château de Cenelle",
                    "image" => "",
                    "id_place_type" => App\PlaceType::where("name", "Château")->first()->id
                ],
                [
                    "name" => "Forêt de Brume",
                    "description" => "La forêt de Brume est une forêt ancestrale très densément boisée en Mortefange",
                    "image" => "",
                    "id_place_type" => App\PlaceType::where("name", "Forêt")->first()->id
                ],
                [
                    "name" => "La Noyeuse",
                    "description" => "La Noyeuse est le fleuve qui marque la frontière entre Mortefange et Neufcâstel",
                    "image" => "",
                    "id_place_type" => App\PlaceType::where("name", "Fleuve")->first()->id
                ]
            ]
        );
    }
}

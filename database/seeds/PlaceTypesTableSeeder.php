<?php

use Illuminate\Database\Seeder;

class PlaceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("place_type")->insert(
            [
                [
                    "name" => "Château",
                    "description" => "Place-forte défensive où vit le seigneur.",
                    "image" => ""
                ],
                [
                    "name" => "Forêt",
                    "description" => "Zone boisée.",
                    "image" => ""
                ],
                [
                    "name" => "Fleuve",
                    "description" => "Un cours d'eau au lit large qui se jette dans la mer.",
                    "image" => ""
                ]
            ]
        );
    }
}

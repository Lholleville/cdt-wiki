<?php

use Illuminate\Database\Seeder;

class EventTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('event_type')->insert(
            [
                [
                    "name" => "décès",
                    "image" => ""
                ],
                [
                    "name" => "mariage",
                    "image" => ""
                ],
                [
                    "name" => "guerre",
                    "image" => ""
                ],
                [
                    "name" => "Assemblée Extraordinaire",
                    "image" => ""
                ]
            ]
        );
    }
}

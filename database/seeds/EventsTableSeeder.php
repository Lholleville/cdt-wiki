<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table("events")->insert(
            [
                [
                    "name" => "Mariage royal de Neufcâstel",
                    "description" => "Ildibad Ebroïn, prince de Neufcâstel, fils du roi Bérenger, épouse sa cousine, Aliénor Ebroïn, fille de Bertrand Ebroïn sous le regard de l'Echiquier dans les eaux de la Noyeuse.",
                    "History" => "blabla",
                    "start_date" => \Carbon\Carbon::createFromDate(1027, 8, 07, 'Europe/Paris'),
                    "end_date" => null,
                    "id_event_type" => App\EventType::where('name', 'mariage')->first()->id,
                    'id_place' => App\Place::where('name', 'La Noyeuse')->first()->id
                ]
            ]
        );
    }
}

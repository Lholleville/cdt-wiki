<?php

use Illuminate\Database\Seeder;

class BlazonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Blazon::create(
            [
                'name' => 'Blason royal Ebroin',
                'description' => 'Cygne d\'argent couronné au champ de pourpre',
                'image' => null,
                'parent_id' => null
            ]
        );

        $parent_id = \App\Blazon::where('name', 'Blason royal Ebroïn')->first()->id;

        \App\Blazon::create(
            [
                'name' => 'Blason de la maison Azalee',
                'description' => 'Cheval d\'argent sur champ de gueules',
                'image' => null,
                'parent_id' => null
            ]
        );

        \App\Blazon::create(
            [
                'name' => 'Blason de la maison Ebroin',
                'description' => 'Cygne d\'argent au champ de pourpre',
                'image' => null,
                'parent_id' => $parent_id
            ]
        );
    }
}

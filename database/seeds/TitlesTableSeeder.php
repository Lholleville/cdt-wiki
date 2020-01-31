<?php

use Illuminate\Database\Seeder;
use App\Title;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->delete();
        Title::create(
            [
                'name' => 'Roi de Neufcâstel',
                'description' => 'Gouverne le royaume de Neufcâstel',
                'parent_id' => null
            ]
        );

        Title::create(
            [
                'name' => 'Princesse de Neufcâstel',
                'description' => '',
                'parent_id' => Title::where('name', 'Roi de Neufcâstel')->first()->id
            ]
        );
    }
}

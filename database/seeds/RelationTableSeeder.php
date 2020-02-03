<?php

use Illuminate\Database\Seeder;

class RelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('relationship_type')->insert(
          [
              [
                  'name' => 'siblings',
                  'masculine' => 'frère',
                  'feminine' => 'soeur'
              ],
              [
                  'name' => 'cousins',
                  'masculine' => 'cousin',
                  'feminine' => 'cousine'
              ]
          ]
        );
    }
}

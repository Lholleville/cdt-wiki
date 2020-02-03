<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DeleteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_religion')->delete();
        DB::table('character_weapon')->delete();
        DB::table('character_title')->delete();
        DB::table('character_relationship')->delete();
        DB::table('nicknames')->delete();
        DB::table('characters')->delete();
        DB::table('religions')->delete();
        DB::table('titles')->delete();
        DB::table('relationship_type')->delete();
        DB::table('blazons')->delete();
        DB::table('weapons')->delete();

        DB::update("ALTER TABLE blazons AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE relationship_type AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE titles AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE religions AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE characters AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE nicknames AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE weapons AUTO_INCREMENT = 1;");
    }
}

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
        DB::table('character_event')->delete();
        DB::table('nicknames')->delete();
        DB::table('characters')->delete();
        DB::table('religions')->delete();
        DB::table('titles')->delete();
        DB::table('relationship_type')->delete();
        DB::table('blazons')->delete();
        DB::table('weapons')->delete();
        DB::table('events')->delete();
        DB::table('event_type')->delete();
        DB::table('places')->delete();
        DB::table('place_type')->delete();

        DB::update("ALTER TABLE blazons AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE relationship_type AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE titles AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE religions AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE characters AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE nicknames AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE weapons AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE places AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE place_type AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE events AUTO_INCREMENT = 1;");
        DB::update("ALTER TABLE event_type AUTO_INCREMENT = 1;");
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DeleteTableSeeder::class);
        $this->command->info('Purging tables ...');
        $this->call(BlazonTableSeeder::class);
        $this->command->info('Blazons table seeded!');
        $this->call(CharactersTableSeeder::class);
        $this->command->info('Characters table seeded!');
        $this->call(WeaponsTableSeeder::class);
        $this->command->info('Weapons table seeded!');
        $this->call(ReligionsTableSeeder::class);
        $this->command->info('Religions table seeded');
        $this->call(TitlesTableSeeder::class);
        $this->command->info('Titles table seeded');
        $this->call(RelationTableSeeder::class);
        $this->command->info('Relation table seeded!');
        $this->call(NicknamesTableSeeder::class);
        $this->command->info('Nicknames table seeded!');
        $this->call(AssociateTableSeeder::class);
        $this->command->info('Association between tables seeded!');
    }
}

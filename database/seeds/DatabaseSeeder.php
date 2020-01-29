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
        $this->call(CharactersTableSeeder::class);
        $this->command->info('Characters table seeded!');
        $this->call(WeaponsTableSeeder::class);
        $this->command->info('Weapons table seeded!');
        $this->call(AssociateTableSeeder::class);
        $this->command->info('Association between tables seeded!');
    }
}

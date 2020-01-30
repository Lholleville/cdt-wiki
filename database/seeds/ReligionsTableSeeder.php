<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();
        \App\Religion::create([
            'name' => 'Culte Héliothéique',
            'description' => 'Le seigneur de la Lumière montre la voie du Paradis à ses fidèles',
            'history' => 'apparue au IIème siècle',
            'image' => null
        ]);

        \App\Religion::create([
            'name' => 'Culte de Mithar',
            'description' => 'Mithar nourrit son horloge des âmes des défunts.',
            'history' => 'apparue il y a des milliers d\'années',
            'image' => null
        ]);

        \App\Religion::create([
            'name' => 'Culte de Sharamati',
            'description' => 'La petite fille qui devint déesse.',
            'history' => 'Apparue il y a des milliers d\'années',
            'image' => null
        ]);
    }
}

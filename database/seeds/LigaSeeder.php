<?php

use App\Liga;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Liga::create([
            'name' => 'Bundes Liga',
            'country' => 'Jerman',
            'image' => 'bundesliga.png',
        ]);

        Liga::create([
            'name' => 'Premier League',
            'country' => 'Inggris',
            'image' => 'premierleague.png',
        ]);

        Liga::create([
            'name' => 'La Liga',
            'country' => 'Spanyol',
            'image' => 'laliga.png',
        ]);

        Liga::create([
            'name' => 'Serie A',
            'country' => 'Itali',
            'image' => 'seriea.png',
        ]);
    }
}

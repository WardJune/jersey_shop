<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'CHELSEA 3RD 2018-2019',
            'liga_id' => 2,
            'image' => 'chelsea.png'
        ]);

        Product::create([
            'name' => 'LEICESTER CITY HOME 2018-2019',
            'liga_id' => 2,
            'image' => 'leicester.png'
        ]);

        Product::create([
            'name' => 'MAN. UNITED AWAY 2018-2019',
            'liga_id' => 2,
            'image' => 'mu.png'
        ]);

        Product::create([
            'name' => 'LIVERPOOL AWAY 2018-2019',
            'liga_id' => 2,
            'image' => 'liverpool.png'
        ]);

        Product::create([
            'name' => 'TOTTENHAM 3RD 2018-2019',
            'liga_id' => 2,
            'image' => 'tottenham.png'
        ]);

        Product::create([
            'name' => 'DORTMUND AWAY 2018-2019',
            'liga_id' => 1,
            'image' => 'dortmund.png'
        ]);

        Product::create([
            'name' => 'BAYERN MUNCHEN 3RD 2018 2019',
            'liga_id' => 1,
            'image' => 'munchen.png'
        ]);

        Product::create([
            'name' => 'JUVENTUS AWAY 2018-2019',
            'liga_id' => 4,
            'image' => 'juve.png'
        ]);

        Product::create([
            'name' => 'AS ROMA HOME 2018-2019',
            'liga_id' => 4,
            'image' => 'asroma.png'
        ]);

        Product::create([
            'name' => 'AC MILAN HOME 2018 2019',
            'liga_id' => 4,
            'image' => 'acmilan.png'
        ]);

        Product::create([
            'name' => 'LAZIO HOME 2018-2019',
            'liga_id' => 4,
            'image' => 'lazio.png'
        ]);

        Product::create([
            'name' => 'REAL MADRID 3RD 2018-2019',
            'liga_id' => 3,
            'image' => 'madrid.png'
        ]);
    }
}

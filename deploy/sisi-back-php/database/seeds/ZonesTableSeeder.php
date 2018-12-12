<?php

use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $zones = [
                ['name' =>  'Fox',               'description' => 'Medicina',           'campus' => 'Recife'],
                ['name' =>  'Zona 009',          'description' => 'Fisioterapia',       'campus' => 'Recife'],
                ['name' =>  'Horse',             'description' => 'CCO',                'campus' => 'Recife'],

                ['name' =>  'Dog',               'description' => 'Artes',              'campus' => 'Caruaru'],
                ['name' =>  'Zona 002',          'description' => 'Odontologia',        'campus' => 'Caruaru'],
                ['name' =>  'Cat',               'description' => 'Educação fisica',    'campus' => 'Caruaru'],

                ['name' =>  'Cat',               'description' => 'Educação fisica',    'campus' => 'Vitória'],
                ['name' =>  'Fish',              'description' => 'Artes',              'campus' => 'Vitória'],
                ['name' =>  'Zona 3421',         'description' => 'Educação fisica',    'campus' => 'Vitória'],

        ];


        foreach ($zones as $zone) {
            \App\Entities\Zone::create($zone);
        }

    }
}


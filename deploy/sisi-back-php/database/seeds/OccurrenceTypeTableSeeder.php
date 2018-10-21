<?php

use Illuminate\Database\Seeder;

class OccurrenceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Furto',                     'description' => 'Furto é o ato de retirar algo que pertence por direito a outra pessoa, contra a vontade desta, mas sem o uso de violência contra a vítima.'],
            ['name' => 'Roubo',                     'description' => 'Crime que consiste em subtrair coisa móvel pertencente a outrem por meio de violência ou de grave ameaça.'],
            ['name' => 'Assalto a grupo',           'description' => 'Crime realizado por um grupo de pessoas que consiste em subtrair coisa móvel pertencente a outrem por meio de violência ou de grave ameaça.'],
            ['name' => 'Sequestro relâmpago',       'description' => 'Crime no qual uma vítima, geralmente sequestrada em seu próprio veículo, é mantida por um curto espaço de tempo.'],
            ['name' => 'Arrombamento veicular',     'description' => 'Crime que consiste em dano ao veículo para subtrair itens do mesmo.'],
            ['name' => 'Roubo de veículo',          'description' => 'Crime no qual o veículo da vítima é subtraido.'],
            ['name' => 'Arrastão',                  'description' => 'Ação orquestrada de vários individuos, geralmente vândalos, para saquear e roubar.'],
            ['name' => 'Tentativa de assalto',      'description' => 'Tentativa de subtrair coisa móvel pertencente a outrem por meio de violência ou grave ameaça.'],

        ];

        foreach ($types as $type) {
            \App\Entities\OccurrenceType::create($type);
        }

    }
}

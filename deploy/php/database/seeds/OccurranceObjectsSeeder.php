<?php

use Illuminate\Database\Seeder;

class OccurranceObjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $objects = [
            ['description'      => 'Bicicletas'],
            ['description'      => 'Celular'],
            ['description'      => 'Documentos'],
            ['description'      => 'Notebook'],
            ['description'      => 'Veículos'],
            ['description'      => 'Objetos Pessoais'],
            ['description'      => 'Outros'],

        ];
        foreach ($objects as $object) {
            \App\Entities\OccurrenceObject::create($object);
        }
    }
}

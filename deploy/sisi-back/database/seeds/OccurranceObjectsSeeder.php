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
            ['description'      =>  'Objetos Pessoais'],
            ['description'      => 'Documentos'],
            ['description'      => 'Bicicletas'],
            ['description'      => 'Celular'],
            ['description'      => 'Notebook'],
            ['description'      => 'Veículos'],
            ['description'      => 'Outros'],

        ];
        foreach ($objects as $object) {
            \App\Entities\OccurrenceObject::create($object);
        }
    }
}

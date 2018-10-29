<?php

use Illuminate\Database\Seeder;

class IrregularityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Controle de Animais',       'description' => 'Irregularidades que envolvem animais abandonados, selvagens e etc.'],
            ['name' => 'Iluminação',                'description' => 'Irregularidades que influenciam na qualidade da iluminação publica.'],
            ['name' => 'Acessibilidade',            'description' => 'Qualquer irregualridade que impeça o livre fluxo de estudantes / acesso de pessoas com necessidades especiais.'],
            ['name' => 'Poda',                      'description' => 'Irregularidades que envolvem necessidade de podas de arvores e plantas em geral.'],
            ['name' => 'Poluição',                  'description' => 'Irregualridades que põe em risco a sáude dos estudantes e poluições em geral'],
            ['name' => 'Outros',                    'description' => 'Qualquer outra irregularidade que não se encaixe nas outras opções'],

        ];

        foreach ($types as $type) {
            \App\Entities\IrregularityTypes::create($type);
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Usuário Comum',         'department' => ''],
            ['name' => 'Inspetor',              'department' => 'DFCU'],
            ['name' => 'Diretor',               'department' => 'DFCU'],
            ['name' => 'Segurança',             'department' => 'DENS'],
            ['name' => 'Inspetor',              'department' => 'DENS'],
            ['name' => 'Inspetor Geral',        'department' => 'DENS'],
            ['name' => 'Diretor Operacional',   'department' => 'DENS'],
            ['name' => 'Superitendente',        'department' => 'DENS'],
            ['name' => 'Investigador',          'department' => 'DIP'],
            ['name' => 'Investigador Chefe',    'department' => 'DIP'],
            ['name' => 'Superitendente',        'department' => 'DIP'],
        ];

        foreach ($roles as $role) {
            \App\Entities\Role::create($role);
        }
    }
}

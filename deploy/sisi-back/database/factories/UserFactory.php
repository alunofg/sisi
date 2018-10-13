<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Entities\User::class, function (Faker $faker) {


    $gender     = ['MASCULINO','FEMININO','TRANS_MASC','TRANS_FEM'];
    $skin_color = ['BRANCO','PARDO','NEGRO','INDIGENA','AMARELO'];
    $status     = ['ATIVO','BLOQUEADO','INATIVO'];
    return [
        'name'              => $faker->name,
        'cpf'               => rand(01111111111, 99999999999),
        'birthdate'         => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-18 years'),
        'gender'            => $gender[array_rand($gender,1)],
        'skin_color'        => $skin_color[array_rand($skin_color, 1)],
        'cellphone'         => rand(9111111111, 999999999),
        'phone'             => rand(3111111111, 399999999),
        'status'            => $status[array_rand($status, 1)],
        'email'             => $faker->unique()->safeEmail,
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'role_id'           => rand(1, 9),
        'remember_token'    => str_random(10),
    ];
});

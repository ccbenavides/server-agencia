<?php

use Faker\Generator as Faker;

$factory->define(App\Agencia::class, function (Faker $faker) {
    return [
        'nombre' => $faker->lastName ,
        'direccion' => $faker->address ,
        'rubro' => $faker->domainWord ,
        'telefono' => $faker->phoneNumber
    ];
});

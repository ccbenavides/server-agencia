<?php

use Faker\Generator as Faker;

$factory->define(App\Marca::class, function (Faker $faker) {
    return [
        'nombre' => $faker->lastName ,
        'central' => $faker->postcode ,
        'telefono' => $faker->phoneNumber ,
        'email' => $faker->email
    ];
});

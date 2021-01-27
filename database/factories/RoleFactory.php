<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
    ];
});

$factory->state(Role::class, 'educator', [
    'id' => '2',
    "name" => "educator"
]);

$factory->state(Role::class, 'institution', [
    'id' => '3',
    "name" => "institution"
]);


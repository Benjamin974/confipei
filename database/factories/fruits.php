<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FruitsModel;
use App\Model;
use Faker\Generator as Faker;

$factory->define(FruitsModel::class, function (Faker $faker) {
    return [
        "name" => $faker->firstname,
        "username" => $faker->firstname,
        "email" => $faker->email

    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\ProducteursModel;
use App\User;
use Faker\Generator as Faker;

$factory->define(ProducteursModel::class, function (Faker $faker) {
    return [
        "name" => $faker->firstname,
        "id_user" => User::all()->random()->id,
    ];
});

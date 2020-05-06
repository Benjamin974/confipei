<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\RecompensesModel;
use Faker\Generator as Faker;

$factory->define(RecompensesModel::class, function (Faker $faker) {
    return [
        'name' => $faker->firstname,
    ];
});

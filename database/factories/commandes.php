<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommandesModel;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(CommandesModel::class, function (Faker $faker) {
    return [
        "id_user" =>  User::all()->random()->id,
    ];
});

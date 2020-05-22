<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PhotosModel;
use Faker\Generator as Faker;

$factory->define(PhotosModel::class, function (Faker $faker) {
    return [
        "photo" => $faker->firstname,
    ];
});

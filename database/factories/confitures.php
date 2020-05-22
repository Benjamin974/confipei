<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ConfituresModel;
use App\Model;
use App\PhotosModel;
use App\ProducteursModel;
use Faker\Generator as Faker;

$factory->define(ConfituresModel::class, function (Faker $faker) {

    return [
        "name" => $faker->firstname,
        "prix" => $faker->buildingNumber,
        "id_producteur" =>  ProducteursModel::all()->random()->id,
        "id_photo" => PhotosModel::all()->random()->id,
    ];
});

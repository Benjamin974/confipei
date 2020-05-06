<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ConfituresModel;
use App\ConfitureRecompense;
use App\Model;
use App\ProducteursModel;
use App\RecompensesModel;
use Faker\Generator as Faker;

$factory->define(ConfitureRecompense::class, function (Faker $faker) {
    return [
        "id_confiture" => rand(1,3),
        "id_recompense" => rand(1,3)
    ];
});

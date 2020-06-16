<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        "id_commande" => rand(1,3),
        "id_quantite" => rand(1,3)
    ];
});

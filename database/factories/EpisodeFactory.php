<?php

use Faker\Generator as Faker;

$factory->define(App\Episode::class, function (Faker $faker) {
    return [
        'series_id' => function () {
            return factory('App\Series')->create()->id;
        },
        'title' => $faker->sentence
    ];
});

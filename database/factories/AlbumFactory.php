<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'album_cover' => $faker->imageUrl(),
        'artist' => $faker->name(),
        'album' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'genre' =>$faker->word(),
        'production_year' => $faker->year($max = 'now'),
        'record_label' => $faker->company(),
        'tracklist' => $faker->text(),
        'rating' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10)
    ];
});

<?php



$factory->define(App\Flyer::class, function (Faker\Generator $faker) {

    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'country' => $faker->country,
        'price' => $faker->numberBetween(10000, 5000000),
        'description' => $faker->paragraph,
    ];
});

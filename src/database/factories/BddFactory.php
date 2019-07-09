<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */;
use Faker\Generator as Faker;
use Omatech\MageBdd\App\Models\BddDomain;
use Omatech\MageBdd\App\Models\BddFeature;
use Omatech\MageBdd\App\Models\BddScenario;
use Omatech\MageBdd\App\Models\BddLine;

$factory->define(BddDomain::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'color' => $faker->randomElement(['primary', 'info', 'success', 'warning', 'danger', 'gray', 'black'])
    ];
});

$factory->define(BddFeature::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'color' => $faker->randomElement(['primary', 'info', 'success', 'warning', 'danger', 'gray', 'black'])
    ];
});

$factory->define(BddScenario::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(),
    ];
});

$factory->define(BddLine::class, function (Faker $faker) {

    return [
        'text' => $faker->text(),
        'type' => $faker->randomElement(['as_a', 'i_want', 'so_that', 'given', 'when', 'then'])
    ];
});
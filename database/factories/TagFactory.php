<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(tag::class, function (Faker $faker) {
    return [
        'name' => $faker -> words(2, true),
    ];
});

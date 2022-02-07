<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=> $faker-> words(3, true),
        'text'=> $faker-> text(),
        'author'=> $faker-> name(),
        'likes'=> $faker-> numberBetween(0, 7000),
    ];
});

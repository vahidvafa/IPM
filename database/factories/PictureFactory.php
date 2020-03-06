<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    $news = \App\News::all()->random();
    return [
        'news_id' => $news->id,
        'url' => 'popular' . random_int(1, 4) . '.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

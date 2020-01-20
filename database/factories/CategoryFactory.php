<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $lang_type=random_int(1,2);
    if ($lang_type == 1)
    return [
        'title'=>"تست سته بندی ".(Category::all('id')->last()->id+1),
        'lang_id'=>$lang_type,
        'created_at' => now(),
    ];
    else
        return [
            'title' =>"test title category".(Category::all('id')->last()->id+1),
            'lang_id'=>$lang_type,
            'created_at' => now(),
    ];

});

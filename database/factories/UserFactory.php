<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_replace($faker->name,' ','-'),
        'user_code' => $faker->randomDigit,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'roles' => random_int(0,2),
        'active' => random_int(0,1),
        'reagent_id' => User::all('id')->random()->id,
        'branch' => 1,
        'expire' => random_int(time(),time()+31568385),
        'membership_type_id' => random_int(0,4),
        'profile_picture' => $faker->name.".png",
        'resume_address' => $faker->name."resume",
        'about_me' => str_repeat('about me text ',10),
        'shortcomings' => str_repeat("shortcomings ",4),
    ];
});
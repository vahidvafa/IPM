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
    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'name_en' => "test en name",
        'slug' => str_replace(' ','-',$firstName.' '.$lastName),
        'user_code' => $faker->unique()->randomDigit,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$kFUrrQ/.CelUMYMb0arAR.q0Bg06EcYqh8udKP6VqjDefKF.U5z2C', // password ( 1 to 6 )
        'remember_token' => Str::random(10),
        'roles' => random_int(0,2),
        'active' => random_int(0,1),
        'reagent_id' => random_int(0,User::all('id')->count()),
        'branch' => 1,
        'expire' => random_int(time(),time()+31568385),
        'membership_type_id' => random_int(0,4),
        'profile_picture' => $faker->name.".png",
        'resume_address' => $faker->name."resume",
        'about_me' => str_repeat('about me text ',10),
        'shortcomings' => str_repeat("shortcomings ",4),
        'created_at' => now(),
    ];
});

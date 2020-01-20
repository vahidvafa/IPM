<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\langs::class,2)->create();
        factory(\App\User::class,5)->create();
        factory(\App\Category::class,5)->create();
        factory(\App\Event::class,2)->create();
    }
}

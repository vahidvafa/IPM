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
//        $this->call();
        factory(\App\Lang::class,2)->create();
        factory(\App\User::class,5)->create();
        factory(\App\Category::class,5)->create();
        factory(\App\Event::class,10)->create();
        factory(\App\Profile::class,6)->create();
        factory(\App\workExperience::class,6)->create();
        factory(\App\education::class,6)->create();
    }
}

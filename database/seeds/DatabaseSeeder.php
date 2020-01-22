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
        $this->call(LangsSeeder::class);
        $this->call(MembershipTypeSeeder::class);
        factory(\App\User::class,8)->create();
        factory(\App\EventCategory::class,18)->create();
        factory(\App\Event::class,10)->create();
        factory(\App\Profile::class,5)->create();
        factory(\App\WorkExperience::class,12)->create();
        factory(\App\Education::class,15)->create();
        factory(\App\PassedCoursesCategory::class,10)->create();
        factory(\App\PassedCourses::class,25)->create();
        factory(\App\Document::class,45)->create();
        factory(\App\News::class,6)->create();
    }
}

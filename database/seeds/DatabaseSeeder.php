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
        $this->call(ProvinceSeeder::class);
        $this->call(PassedCoursesCategorySeeder::class);
        $this->call(BranchSeeder::class);
        factory(\App\User::class,10)->create();
        factory(\App\EventCategory::class,18)->create();
        factory(\App\Event::class,20)->create();
        factory(\App\Profile::class,10)->create();
        factory(\App\Company::class,5)->create();
        factory(\App\WorkExperience::class,12)->create();
        factory(\App\Education::class,15)->create();
        factory(\App\PassedCourses::class,25)->create();
        factory(\App\Document::class,45)->create();
        factory(\App\News::class,40)->create();
        factory(\App\Picture::class,80)->create();
        factory(\App\visibiliy::class,20)->create();
        factory(\App\IPMA::class,1)->create();
        factory(\App\JobsCategory::class,19)->create();
        factory(\App\Job::class,350)->create();
        factory(\App\Message::class,10)->create();
        factory(\App\Order::class,40)->create();
        factory(\App\OrderCode::class,80)->create();
    }
}

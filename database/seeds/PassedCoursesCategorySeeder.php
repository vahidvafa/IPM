<?php

use Illuminate\Database\Seeder;

class PassedCoursesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=array("گواهی نامه ها","جوایز","مدارک");

        foreach ($names as $name)
        DB::table("passed_courses_categories")->insert([
            'name'=>$name,
            "lang_id"=>mt_rand(0,1),

        ]);

    }
}

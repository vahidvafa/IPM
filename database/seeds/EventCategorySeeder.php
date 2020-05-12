<?php

use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("event_categories")->insert([
            "name" => "آموزش ها"
        ]);
        DB::table("event_categories")->insert([
            "name" => "جوایز و مسابقات"
        ]);
        DB::table("event_categories")->insert([
            "name" => "آزمون و گواهینامه ها"
        ]);
    }
}

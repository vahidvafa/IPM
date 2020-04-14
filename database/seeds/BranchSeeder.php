<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("branches")->insert([
            "title"=>"مرکز",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table("branches")->insert([
            "title"=>"اصفهان",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table("branches")->insert([
            "title"=>"خراسان",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table("branches")->insert([
            "title"=>"شمالغرب",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table("branches")->insert([
            "title"=>"جنوب",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}

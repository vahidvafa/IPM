<?php

use Illuminate\Database\Seeder;

class WorkingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('working_groups')->insert(['title'=>"کار گروه زنان",'created_at' => now(),'updated_at'=>now()]);
        DB::table('working_groups')->insert(['title'=>"کار گروه PMIS",'created_at' => now(),'updated_at'=>now()]);
        DB::table('working_groups')->insert(['title'=>"کار گروه مدیریت دانش",'created_at' => now(),'updated_at'=>now()]);
        DB::table('working_groups')->insert(['title'=>"کار گروه استارت آپ",'created_at' => now(),'updated_at'=>now()]);
        DB::table('working_groups')->insert(['title'=>"کار گروه سید و برنامه پروژه",'created_at' => now(),'updated_at'=>now()]);
    }
}

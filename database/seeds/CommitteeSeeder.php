<?php

use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('committees')->insert(['title'=>"کمیته عضویت",'created_at' => now(),'updated_at'=>now()]);
        DB::table('committees')->insert(['title'=>"کمیته جایزه ملی",'created_at' => now(),'updated_at'=>now()]);
        DB::table('committees')->insert(['title'=>"کمیته آموزش",'created_at' => now(),'updated_at'=>now()]);
        DB::table('committees')->insert(['title'=>"کمیته پژوهش و انتشارات",'created_at' => now(),'updated_at'=>now()]);
        DB::table('committees')->insert(['title'=>"کمیته گواهینامه ها",'created_at' => now(),'updated_at'=>now()]);
    }
}

<?php

use Illuminate\Database\Seeder;

class MainPageSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_page_sponsors')->insert(['url'=>'https://mci.ir/','photo'=>"b1.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'https://www.iranianatlas.ir/','photo'=>"b2.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'http://www.farab.com/fa/','photo'=>"b3.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'https://www.mapnanyp.com/','photo'=>"b4.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'https://www.nyu.edu/','photo'=>"b5.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'https://www.nyu.edu/','photo'=>"b5.png"]);
        DB::table('main_page_sponsors')->insert(['url'=>'https://www.nyu.edu/','photo'=>"b5.png"]);
    }
}

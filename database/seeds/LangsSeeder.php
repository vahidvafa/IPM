<?php

use Illuminate\Database\Seeder;

class LangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->insert([
            "name"=>'فارسی',
            "photo"=>"fa.png",
            'created_at'=>now(),
        ]);

        DB::table('langs')->insert([
            "name"=>'english',
            "photo"=>"en.png",
            'created_at'=>now(),
        ]);
    }
}

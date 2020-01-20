<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->tinyInteger('sex')->nullable();
            $table->string('father_name')->nullable();
            $table->string('certificate_number');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->string('national_code');
            $table->text('work_address');
            $table->text('home_address');
            $table->text('work_post');
            $table->text('home_post');
            $table->string('work_tel');
            $table->string('home_tel');
            $table->string('mobile_number');
            //-------------------------------------
            $table->string('established_date');
            $table->string('established_place');
            $table->string('established_number');
            $table->string('economy_number');
            $table->string('national_number');
            $table->string('post_number');
            $table->string('ownership_type');
            $table->string('legal_type');
            $table->string('address');
            $table->string('ceo_name');
            $table->string('ceo_name_en');
            $table->text('ceo_picture');
            $table->string('agent_name');
            $table->string('agent_name_en');
            $table->text('agent_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

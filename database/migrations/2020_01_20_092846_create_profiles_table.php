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
            $table->string('certificate_number')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('national_code')->nullable();
            $table->string('work_name')->nullable();
            $table->text('work_address')->nullable();
            $table->text('home_address')->nullable();
            $table->text('work_post')->nullable();
            $table->text('home_post')->nullable();
            $table->string('work_tel')->nullable();
            $table->string('home_tel')->nullable();
            $table->tinyInteger('receive_place')->nullable();
            $table->string("youTube")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("telegram")->nullable();
            $table->string("twitter")->nullable();
            $table->text("honors")->nullable();
            $table->text("certificate")->nullable();
            //-------------------------------------
            $table->tinyInteger('lang_id',false,true)->default(1);
            $table->timestamps();
            $table->softDeletes();
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

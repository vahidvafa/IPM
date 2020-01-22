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
            $table->text("youTube")->nullable();
            $table->text("facebook")->nullable();
            $table->text("instagram")->nullable();
            $table->text("telegram")->nullable();
            $table->text("twitter")->nullable();
            //-------------------------------------
            $table->string('established_date')->nullable();
            $table->string('established_place')->nullable();
            $table->string('established_number')->nullable();
            $table->string('economy_number')->nullable();
            $table->string('national_number')->nullable();
            $table->string('post_number')->nullable();
            $table->string('ownership_type')->nullable();
            $table->string('legal_type')->nullable();
            $table->string('address')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('ceo_name_en')->nullable();
            $table->text('ceo_picture')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_name_en')->nullable();
            $table->text('agent_picture')->nullable();
            $table->tinyInteger('lang_id',false,true);
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

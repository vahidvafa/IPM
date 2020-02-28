<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassedCoursesUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passed_courses_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('passed_courses_id')->unsigned()->index();
            $table->foreign('passed_courses_id')->references('id')->on('passed_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passed_courses_user');
    }
}

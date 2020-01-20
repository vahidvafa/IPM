<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('user_code')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('roles')->default(2);
            $table->tinyInteger('active');
            $table->bigInteger('reagent_id');
            $table->bigInteger('branch');
            $table->bigInteger('expire');
            $table->bigInteger('membership_type_id');
            $table->text('profile_picture')->nullable();
            $table->text('resume_address')->nullable();
            $table->text('about_me')->nullable();
            $table->text('shortcomings')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

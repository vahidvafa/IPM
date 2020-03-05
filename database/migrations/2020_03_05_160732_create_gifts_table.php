<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->double('price')->default(0);
            $table->tinyInteger('type_id')->comment('1 => %  ,  2 => price');
            $table->integer('maximum_count')->comment('0 => unlimited ,  != 0 => limited usage');
            $table->integer('minimum_price')->comment('0 => unlimited ,  != 0 => limited price');
            $table->integer('maximum_price')->comment('0 => unlimited ,  != 0 => limited price');
            $table->tinyInteger('members_usage')->comment('0 => only forum users ,  1 => all of users');
            $table->bigInteger('from_date')->default(0)->comment('0 => unlimited ,  != 0 => limited time');
            $table->bigInteger('to_date')->default(0)->comment('0 => unlimited ,  != 0 => limited time');
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
        Schema::dropIfExists('gifts');
    }
}

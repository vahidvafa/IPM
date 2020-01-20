<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->text('course_headings')->nullable();
            $table->string('photo')->nullable();
            $table->string('date');
            $table->string('price');
            $table->bigInteger('province_id');
            $table->string('tel');
            $table->text('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('category_id');
            $table->bigInteger('creator_uid');
            $table->timestamps();
            $table->tinyInteger('lang_id',false,true);
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
        Schema::dropIfExists('events');
    }
}

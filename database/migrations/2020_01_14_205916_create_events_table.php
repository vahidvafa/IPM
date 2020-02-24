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
            $table->string('from_date');
            $table->string('to_date');
            $table->string('start_register_date');
            $table->string('price');
            $table->bigInteger('province_id');
            $table->string('tel');
            $table->text('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('event_category_id');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('events');
    }
}

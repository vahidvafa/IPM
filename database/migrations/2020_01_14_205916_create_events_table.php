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
            $table->string('ad_date');
            $table->string('solar_date');
            $table->string('price');
            $table->bigInteger('province_id');
            $table->string('tel');
            $table->text('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('category_id');
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

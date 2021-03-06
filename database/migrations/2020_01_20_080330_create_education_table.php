<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('education_place',50);
            $table->string('grade',20);
            $table->string('from_date','10');
            $table->string('to_date','10')->nullable();
            $table->string('gpa','10');
            $table->string('field_of_study');
//            $table->tinyInteger('state',false,true)->comment("0=>reject(reject_text not null ) | 1=> accept");
//            $table->text('reject_text')->comment("0=>reject()");
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
        Schema::dropIfExists('education');
    }
}

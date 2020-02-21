<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('companies');
    }
}

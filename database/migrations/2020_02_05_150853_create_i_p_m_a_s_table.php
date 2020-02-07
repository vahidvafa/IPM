<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIPMASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_p_m_a_s', function (Blueprint $table) {
            $table->text("head_title");
            $table->text("head_subtitle");
            $table->string("head_description");
            $table->text("address");
            $table->string("tel");
            $table->string("fax");
            $table->string("secretariat_email");
            $table->string("membership_email");
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
        Schema::dropIfExists('i_p_m_a_s');
    }
}

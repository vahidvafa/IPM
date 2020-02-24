<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->text('content');
            $table->bigInteger('min_salary')->nullable()->default(-1);
            $table->bigInteger('max_salary')->nullable()->default(-1);
            $table->string('education')->nullable();
            $table->string('location')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('work_experience')->nullable();
//            $table->bigInteger('expire');
            $table->bigInteger('province_id');
            $table->bigInteger('jobsCategory_id');
            $table->tinyInteger('sex')->default(-1);
            $table->tinyInteger('state')->default(0);
            $table->tinyInteger('lang_id',false,true)->default(1);
            $table->text('benefits')->nullable();
//            $table->text('job_description')->nullable();
            $table->integer("visibility_count")->default(0);
            $table->string("company_logo")->nullable()->default("company_logo.png");
            $table->text("skills")->nullable();
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
        Schema::dropIfExists('jobs');
    }
}

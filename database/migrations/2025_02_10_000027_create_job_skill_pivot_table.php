<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSkillPivotTable extends Migration
{
    public function up()
    {
        Schema::create('job_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_10391966')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id', 'skill_id_fk_10391966')->references('id')->on('skills')->onDelete('cascade');
        });
    }
}

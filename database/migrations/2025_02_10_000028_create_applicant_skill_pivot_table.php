<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantSkillPivotTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id', 'applicant_id_fk_10391908')->references('id')->on('applicants')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id', 'skill_id_fk_10391908')->references('id')->on('skills')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantJobTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_job_type', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id', 'applicant_id_fk_10435795')->references('id')->on('applicants')->onDelete('cascade');
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id', 'job_type_id_fk_10435795')->references('id')->on('job_types')->onDelete('cascade');
        });
    }
}

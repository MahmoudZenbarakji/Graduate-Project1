<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkExpenriencesTable extends Migration
{
    public function up()
    {
        Schema::table('work_expenriences', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id', 'applicant_fk_10433430')->references('id')->on('applicants');
        });
    }
}

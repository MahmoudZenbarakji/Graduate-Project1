<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEducationsTable extends Migration
{
    public function up()
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id', 'applicant_fk_10432254')->references('id')->on('applicants');
        });
    }
}

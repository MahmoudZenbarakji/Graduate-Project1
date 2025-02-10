<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCvsTable extends Migration
{
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id', 'applicant_fk_10391960')->references('id')->on('applicants');
        });
    }
}

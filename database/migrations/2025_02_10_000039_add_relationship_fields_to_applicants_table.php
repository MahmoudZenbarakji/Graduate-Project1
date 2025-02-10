<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicantsTable extends Migration
{
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10391898')->references('id')->on('users');
            $table->unsignedBigInteger('salary_id')->nullable();
            $table->foreign('salary_id', 'salary_fk_10391902')->references('id')->on('salaries');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id', 'nationality_fk_10391903')->references('id')->on('nationalities');
        });
    }
}

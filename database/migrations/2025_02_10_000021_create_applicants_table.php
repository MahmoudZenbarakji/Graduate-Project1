<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('education_level');
            $table->integer('experience_year');
            $table->string('gender');
            $table->string('other_phone_number')->nullable();
            $table->date('birth_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExpenriencesTable extends Migration
{
    public function up()
    {
        Schema::create('work_expenriences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('header');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('organization');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('experiences_year');
            $table->string('status');
            $table->string('working_hour');
            $table->date('closed_date')->nullable();
            $table->longText('responsibility')->nullable();
            $table->longText('requirement')->nullable();
            $table->longText('benefits')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

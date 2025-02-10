<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_main')->default(0)->nullable();
            $table->string('cv_title');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

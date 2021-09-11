<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration
{
  
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('students');
    }
}

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
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('students');
    }
}

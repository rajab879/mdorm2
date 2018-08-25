<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblroomtypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblroomtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roomtype');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblroomtypes');
    }
}




//INSERT INTO `tblroomtype` VALUES (1,'مفرد مميز'),(2,'مفرد عادي'),(3,'ثنائي مميز'),(4,'ثلاثي  '),(5,'ثنائي عادي');


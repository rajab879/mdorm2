<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblstudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstudents', function (Blueprint $table) {
            $table->increments('id');
            $table->double('Col001')->unsigned();
            $table->string('fname');
            $table->string('stdid');
            $table->integer('collegeid')->unsigned();
            $table->integer('roomno')->unsigned();
            $table->integer('roomtypeid')->unsigned();
            $table->integer('buildid')->unsigned();
            $table->integer('extension')->unsigned();



            $table->string('mobile');
            $table->string('donor');
            $table->string('country');

            $table->integer('nationalityid')->unsigned();
            $table->string('snote');

            $table->integer('semid')->unsigned();














            $table->foreign('buildid')->references('id')->on('tblbuilds');
            $table->foreign('collegeid')->references('id')->on('tblcolleges');
            $table->foreign('nationalityid')->references('id')->on('tblnationalitys');
            $table->foreign('roomtypeid')->references('id')->on('tblroomtypes');
            $table->foreign('semid')->references('id')->on('tblsems');


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
        Schema::dropIfExists('tblstudents');
    }
}


/*
  `Col001` double DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `stdid` varchar(255) DEFAULT NULL,
  `collegeid` varchar(255) DEFAULT NULL,
  `roomno` double DEFAULT NULL,
  `roomtypeid` varchar(255) DEFAULT NULL,
  `buildid` varchar(255) DEFAULT NULL,
  `extension` double DEFAULT NULL,
  `mobil` varchar(255) DEFAULT NULL,
  `dono` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationalityid` varchar(255) DEFAULT NULL,
  `snote` varchar(255) DEFAULT NULL,
  `familyname` char(10) DEFAULT NULL,
  `semid` int(11) DEFAULT NULL
 */
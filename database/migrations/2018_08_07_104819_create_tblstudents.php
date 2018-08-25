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
            $table->engine = 'MyISAM';//allow multiply primary key
           // $table->increments('id');
            $table->integer('id')->unsigned();
            $table->double('Col001')->unsigned();
            $table->string('fname');
            $table->string('stdid');
            $table->integer('collegeid')->unsigned();
            $table->integer('roomno')->unsigned();
            $table->integer('roomtypeid')->unsigned();
            $table->integer('buildid')->unsigned();
            $table->integer('extension')->unsigned()->default(null);



            $table->string('mobile');
            $table->string('donor');
            $table->integer('nationalityid')->unsigned();
            $table->string('snote')->default(null);
            $table->integer('semid')->unsigned();




           // $table->dropPrimary("id");//remove auto incr primary key
          //  $table->primary(array(  'stdid', 'semid'));


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

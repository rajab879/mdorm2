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

         //  $table->engine = 'MyISAM';//allow multiply primary key
          // $table->increments('id');
           $table->integer('id')->unsigned();
           $table->double('Col001')->nullable()->unsigned();
           $table->string('fname');
           $table->string('stdid');
           $table->integer('collegeid')->unsigned();
           $table->integer('roomno')->unsigned();
           $table->integer('roomtypeid')->unsigned();
           $table->integer('buildid')->unsigned();
           $table->integer('extension')->unsigned()->nullable()->default(null);



           $table->string('mobile');
           $table->string('donor')->nullable()->default(null);
           $table->string('country')->nullable()->default(null);
           $table->integer('nationalityid')->unsigned();

           $table->string('snote')->nullable()->default(null);
           $table->integer('semid')->unsigned();





                        $table->primary(array(  'stdid', 'semid'));

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
 *
 * `id` int(11) NOT NULL AUTO_INCREMENT,
  `Col001` double DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `stdid` varchar(255) NOT NULL,
  `collegeid` int(10) unsigned NOT NULL,
  `roomno` int(11) NOT NULL,
  `roomtypeid` int(10) unsigned NOT NULL,
  `buildid` int(11) unsigned NOT NULL,
  `extension` int(11) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `donor` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationalityid` int(11) unsigned NOT NULL,
  `snote` varchar(255) DEFAULT NULL,
  `semid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
 */
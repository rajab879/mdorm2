<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbllatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stdid',9);
            $table->integer('semid')->unsigned();
            $table->integer('shiftid')->unsigned();
            $table->dateTime('latedate');
            $table->string('latenote',500);
            $table->integer('userid')->unsigned();
            $table->string('hostname')->nullable()->default(null);

            $table->foreign(['semid', 'stdid'])->references(['semid', 'stdid'])->on('tblstudents');
            $table->foreign('shiftid')->references('id')->on('tblshifts');
            $table->foreign('userid')->references('id')->on('users');
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
        Schema::dropIfExists('tbllates');
    }
}

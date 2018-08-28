<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblshiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblshifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empid')->unsigned();
           $table->integer('shifttimetypeid')->unsigned();
           $table->timestamps();
           $table->foreign('empid')->references('id')->on('tblemps');
            $table->foreign('shifttimetypeid')->references('id')->on('tblshifttimetypes');

        });
        DB::statement("INSERT INTO `tblshifts` VALUES (1,1,1,null,null)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblshifts');
    }
}

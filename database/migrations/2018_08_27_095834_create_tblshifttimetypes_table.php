<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblshifttimetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblshifttimetypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);

            $table->timestamps();
        });

        DB::statement("INSERT INTO `tblshifttimetypes` VALUES (1,'صباحية',null,null)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblshifttimetypes');
    }
}

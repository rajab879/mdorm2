<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemps', function (Blueprint $table) {

            $table->increments('id');
            $table->string('fname',50);
            // $table->integer('userid'); 
            $table->integer('userid')->unsigned()->unique();
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');


        });

        DB::statement("INSERT INTO `tblemps` VALUES (1,'rajab',1,null,null)");
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblemps');
    }
}

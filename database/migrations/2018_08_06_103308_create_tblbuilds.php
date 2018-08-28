<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblbuilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbuilds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buildchar');
            $table->string('buildname');
            $table->string('build');

            $table->timestamps();
        });

        DB::statement("INSERT INTO `tblbuilds` VALUES (1,'M13-A','خالد بن الوليد','A',NULL,NULL),(2,'M13-B','سعد بن ابي وقاص','B',NULL,NULL),(3,'M13-C','صلاح الدين','C',NULL,NULL),(4,'M13-D','طارق بن زياد','D',NULL,NULL),(5,'M13-E','مصعب بن عمير','E',NULL,NULL),(6,'M14','الادارة','m14',NULL,NULL),(7,'M13-B_LAB','مختبر الحاسوب','LAB',NULL,NULL);");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblbuilds');
    }
}

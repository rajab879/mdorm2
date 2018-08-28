<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblcolleges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcolleges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('collegename');
            $table->timestamps();
        });


        DB::statement("INSERT INTO `tblcolleges` VALUES (1,'null',NULL,NULL),(2,'اتصال',NULL,NULL),(3,'اداب',NULL,NULL),(4,'ادارة',NULL,NULL),(5,'التقنية',NULL,NULL),(6,'تنمية',NULL,NULL),(7,'شريعة',NULL,NULL),(8,'صيدلة',NULL,NULL),(9,'طب',NULL,NULL),(10,'طب اسنان',NULL,NULL),(11,'ع.صحية',NULL,NULL),(12,'فنون',NULL,NULL),(13,'قانون',NULL,NULL),(14,'ماجستير',NULL,NULL),(15,'مراكز تعليم',NULL,NULL),(16,'هندسة',NULL,NULL),(17,'هندسة ماجستير',NULL,NULL),(19,'كلية المجتمع\r\n \r\n',NULL,NULL),(20,'اعلام',NULL,NULL),(21,'اقتصاد',NULL,NULL),(22,'علوم الحاسوب',NULL,NULL),(23,'دكتوراه',NULL,NULL),(24,'امتياز',NULL,NULL);");



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcolleges');
    }
}

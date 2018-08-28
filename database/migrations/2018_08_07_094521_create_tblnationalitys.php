<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblnationalitys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnationalitys', function (Blueprint $table) {
            $table->string('nationalityname');
            $table->increments('id');

            $table->timestamps();
        });


    DB::statement("INSERT INTO `tblnationalitys` VALUES ('اردني',1,NULL,NULL),('استرالي',2,NULL,NULL),('افغاني',3,NULL,NULL),('الماني',4,NULL,NULL),('اماراتي',5,NULL,NULL),('امريكي',6,NULL,NULL),('ايراني',7,NULL,NULL),('باكستاني',8,NULL,NULL),('بحريني',9,NULL,NULL),('بدون',10,NULL,NULL),('بريطاني',11,NULL,NULL),('بنجالي',12,NULL,NULL),('بوسنى',13,NULL,NULL),('تركي',14,NULL,NULL),('تشادي',15,NULL,NULL),('تونسي',16,NULL,NULL),('جزائري',17,NULL,NULL),('روسي',19,NULL,NULL),('سعودي',20,NULL,NULL),('سنغالي',21,NULL,NULL),('سوداني',22,NULL,NULL),('سوري',23,NULL,NULL),('شيشاني',24,NULL,NULL),('صومالي',25,NULL,NULL),('عراقي',26,NULL,NULL),('عماني',27,NULL,NULL),('فرنسي',28,NULL,NULL),('فلسطيني',29,NULL,NULL),('قطري',30,NULL,NULL),('كازخستاني',31,NULL,NULL),('كامروني',32,NULL,NULL),('كندي',33,NULL,NULL),('كوري',34,NULL,NULL),('كويتي',35,NULL,NULL),('كيني',36,NULL,NULL),('لبناني',37,NULL,NULL),('ليبي',38,NULL,NULL),('مالي',39,NULL,NULL),('مقدوني',40,NULL,NULL),('مصري',41,NULL,NULL),('مغربي',42,NULL,NULL),('نيجيري',43,NULL,NULL),('هندي',44,NULL,NULL),('هولندي',45,NULL,NULL),('يمني',46,NULL,NULL),('null',47,NULL,NULL),('غاني',48,NULL,NULL),('مورتاني',49,NULL,NULL),('سويدي',50,NULL,NULL),('بنيني',51,NULL,NULL),('جامبيا',52,NULL,NULL),('يوغسلافي',53,NULL,NULL),('سيشل',54,NULL,NULL),('صيني',55,NULL,NULL),('ساحل العاج',56,NULL,NULL),('بوركينافاسو',57,NULL,NULL),('اسباني',58,NULL,NULL),('جزر القمر',59,NULL,NULL),('اوكراني',60,NULL,NULL),('روماني',61,NULL,NULL),('قبرصي',62,NULL,NULL),('جيبوتي',63,NULL,NULL),('تايلاندي',64,NULL,NULL),('منغولي',65,NULL,NULL),('اثيوبى',66,NULL,NULL),('يابانى',67,NULL,NULL),('غامبيا',68,NULL,NULL),('فلبيني',69,NULL,NULL),('بروناي',70,NULL,NULL),('ايطالي',71,NULL,NULL);");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblnationalitys');
    }
}

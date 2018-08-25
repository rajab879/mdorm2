<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTblstudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblstudents', function (Blueprint $table) {
           // DB::statement('ALTER TABLE tblstudents MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
        DB::statement( 'ALTER TABLE `myuostest`.`tblstudents` CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , ADD UNIQUE INDEX `id_UNIQUE` (`id` ASC)');

        DB::statement('ALTER TABLE tblstudents ADD PRIMARY KEY (`stdid`, `semid`)');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblstudents', function (Blueprint $table) {

            DB::statement('ALTER TABLE  `tblstudents` DROP PRIMARY KEY');
            DB::statement('ALTER TABLE `tblstudents` CHANGE COLUMN `id` `id` INT(10) UNSIGNED NULL ,DROP INDEX `id_UNIQUE`');

        });
    }
}

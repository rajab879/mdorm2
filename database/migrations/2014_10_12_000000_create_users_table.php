<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });




     DB::table('users')->insert(array('name'=>'rajab'  ,'email' => 'rjb_sh@hotmail.com',
             'password'=> '$2y$10$JKmXKdd0DCRXSO1uLsenze4qiLGS1C1uQLd6TmNwl2rgwC46GTMCW')
      );//password 123123

        DB::statement('insert into users(name,email,password)values("test","test@test.com","$2y$10$JKmXKdd0DCRXSO1uLsenze4qiLGS1C1uQLd6TmNwl2rgwC46GTMCW")');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

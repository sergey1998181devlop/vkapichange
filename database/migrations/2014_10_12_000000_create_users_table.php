<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('vk_from_id');//id пользователя из контакта
            $table->string('citi_coordinates_y')->default('55.755819');//координаты текущего города пользователя по Y
            $table->string('citi_coordinates_x')->default('37.617644');//координаты текущего города пользователя по X
            $table->string('country')->default('Россия');
            $table->string('city')->default('Москва');
            $table->string('name');
            $table->string('surname');
            $table->integer('wallet');
            $table->string('user_action')->nullable();

            $table->timestamps();
        });


        /*Espatial Column*/
        DB::statement('ALTER TABLE users ADD geometry_point POINT NOT NULL' );
        /*Espatial index (MYISAM only)*/
        DB::statement( 'ALTER TABLE users ADD SPATIAL INDEX index_point(geometry_point)' );
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user', 4);
            $table->longText('json_data');
            $table->string('name', 40);
            $table->integer('public', 1)->default(1);
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
        Schema::drop('cnv');
    }
}

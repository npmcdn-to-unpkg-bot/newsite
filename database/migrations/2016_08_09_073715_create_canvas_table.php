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
            $table->integer('id_pr_size')->default(1);
            $table->integer('id_material')->default(1);
            $table->integer('id_user');
            $table->string('id_cat', 20)->default('event');
            $table->longText('json_data');
            $table->string('name', 40);
            $table->integer('public')->default(1);
            $table->boolean('main');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPlayed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tb_played', function (Blueprint $table) {
            $table->increments('play_id');
            $table->integer('play_id_track')->unsigned();
            $table->timestamp('play_date');
             $table->timestamps();
        });

        Schema::table('tb_played', function(Blueprint $table){
            $table->foreign('play_id_track')->references('track_id')->on('tb_track')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_played');
    }
}

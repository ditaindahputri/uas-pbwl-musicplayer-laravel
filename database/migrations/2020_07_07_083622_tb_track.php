<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_track', function (Blueprint $table) {
            $table->increments('track_id');
            $table->string('track_name', 256);
            $table->integer('track_id_album')->unsigned();
            $table->string('track_time', 10);
            $table->string('track_file', 256);
             $table->timestamps();
  
        });

        Schema::table('tb_track', function(Blueprint $table){
            $table->foreign('track_id_album')->references('album_id')->on('tb_album')
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
         Schema::dropIfExists('tb_track');
    }
    
}

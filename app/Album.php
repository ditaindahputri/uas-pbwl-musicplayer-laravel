<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
     protected $table = "tb_album";

    protected $primaryKey = 'album_id';

    protected $fillable = ['album_artist_id', 'album_name'];

    public function artist(){
    	return $this->belangsTo('App\Artist');
    
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
     protected $table = "tb_played";

    protected $primaryKey = 'play_id';

    protected $fillable = ['play_id_track', 'play_date'];

    public function track() {
    	return $this->belangsTo('App\Track');
    }
}

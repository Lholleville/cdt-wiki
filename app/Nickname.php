<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nickname extends Model
{
    public $timestamps = false;

    public function characters(){
        return $this->belongsTo('App\Character');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $table = "place_type";

    protected $fillable = ['name', 'description', 'image'];

    public $timestamps = false;
}

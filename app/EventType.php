<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    public $timestamps = false;
    protected $table = "event_type";

    public $fillable = ["name", "image"];

}

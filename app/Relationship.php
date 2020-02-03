<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'masculine', 'feminine'];

    public $table = 'relationship_type';

}

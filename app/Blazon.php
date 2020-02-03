<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $parent_id
 * @property Character[] $characters
 */
class Blazon extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'image', 'parent_id'];


    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characters()
    {
        return $this->hasMany('App\Character', 'id_blazon');
    }
}

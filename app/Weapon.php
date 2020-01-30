<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property Character[] $characters
 */
class Weapon extends Model
{

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany('App\Character', null, 'id', 'id_character');
    }
}

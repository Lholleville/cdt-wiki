<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_place_type
 * @property string $name
 * @property string $description
 * @property string $image
 * @property PlaceType $placeType
 * @property CharacterPlace[] $characterPlaces
 * @property Event[] $events
 */
class Place extends Model
{

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['id_place_type', 'name', 'description', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function placeType()
    {
        return $this->belongsTo('App\PlaceType', 'id_place_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characterPlaces()
    {
        return $this->hasMany('App\CharacterPlace', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'id_place');
    }
}

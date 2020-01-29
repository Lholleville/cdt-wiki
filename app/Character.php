<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $id_blazon
 * @property string $firstname
 * @property string $lastname
 * @property string $birthday
 * @property string $image
 * @property boolean $is_dead
 * @property string $deathdate
 * @property string $physical_description
 * @property string $personality
 * @property string $history
 * @property Blazon $blazon
 * @property CharacterPlace[] $characterPlaces
 * @property CharacterRelationship[] $characterRelationships
 * @property CharacterReligion[] $characterReligions
 * @property Title[] $titles
 * @property Weapon[] $weapons
 */
class Character extends Model
{

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['id_blazon', 'firstname', 'lastname', 'birthday', 'image', 'is_dead', 'deathdate', 'physical_description', 'personality', 'history'];

    /**
     * @return BelongsTo
     */
    public function blazons()
    {
        return $this->belongsTo('App\Blazon', 'id_blazon');
    }

    /**
     * @return HasMany
     */
    public function characterPlaces()
    {
        return $this->hasMany('App\Place', 'id_character');
    }

    /**
     * @return HasMany
     */
    public function relationships()
    {
        return $this->hasMany('App\Character', 'id_character');
    }

    /**
     * @return HasMany
     */
    public function religions()
    {
        return $this->BelongsToMany('App\Religion',  null, 'id_character', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function titles()
    {
        return $this->belongsToMany('App\Title', null, 'id', 'id_title');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function weapons()
    {
        return $this->belongsToMany('App\Weapon', null, 'id_character', 'id');
    }

    public function places()
    {
        return $this->belongsToMany('App\Place', null, 'id_character', 'id');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event', null, 'id', 'id');
    }
}

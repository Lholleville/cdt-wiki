<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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

    public function getAgeAttribute(){
        $today = Carbon::createFromDate(1028, 6, 15, 'Europe/Paris');
        $birthdate = Carbon::createFromFormat("Y-m-d", $this->attributes["birthday"]);
        if($this->is_dead && $this->deathdate != null){
            $deathdate = Carbon::createFromFormat("Y-m-d", $this->attributes["deathdate"]);
            return $deathdate->diffInYears($birthdate);
        }
        return $today->diffInYears($birthdate);
    }
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

    public function nicknames(){
        return $this->hasMany('App\Nickname', 'id_character');
    }

    public function getRelationshipsAttribute()
    {
        $relationship = [];
        $rel = DB::table('character_relationship')->select(['id_character', 'id_character_1', 'id_relationship_type'])->where('id_character', $this->id)->orWhere('id_character_1', $this->id)->get();

        foreach ($rel as $r){
            if($this->id == $r->id_character){
                $relation = Character::findOrFail($r->id_character_1);
            }else{
                $relation = Character::findOrFail($r->id_character);
            }
            $rel_type = Relationship::find($r->id_relationship_type);
            $relationtranslated = ($relation->sexe) ? $rel_type->feminine  : $rel_type->masculine;
            $relationship[] = ['name' => $relation->firstname.' '.$relation->lastname, 'rel_type' => $relationtranslated];
        }
        return $relationship;
    }

    /**
     * @return HasMany
     */
    public function religions()
    {
        return $this->BelongsToMany('App\Religion',  null, 'id_character', 'id_religion')->withPivot(['conversion_date']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function titles()
    {
        return $this->belongsToMany('App\Title', null, 'id_character', 'id_title')->withPivot(['start_date', 'end_date']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function weapons()
    {
        return $this->belongsToMany('App\Weapon', null, 'id_character', 'id_weapon');
    }

    public function places()
    {
        return $this->belongsToMany('App\Place', null, 'id_character', 'id_place');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event', null, 'id_character', 'id_event');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $history
 * @property string $image
 * @property CharacterReligion[] $characterReligions
 */
class Religion extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'history', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characterReligions()
    {
        return $this->hasMany('App\CharacterReligion', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $parent_id
 * @property Character[] $characters
 */
class Title extends Model
{

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'parent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany('App\Character', null, 'id_title', 'id_character')->withPivot(['start_date', 'end_date']);
    }
}

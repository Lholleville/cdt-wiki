<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_event_type
 * @property int $id_place
 * @property string $name
 * @property string $description
 * @property string $history
 * @property string $start_date
 * @property string $end_date
 * @property EventType $eventType
 * @property Place $place
 */
class Event extends Model
{

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['id_event_type', 'id_place', 'name', 'description', 'history', 'start_date', 'end_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventType()
    {
        return $this->belongsTo('App\EventType', 'id_event_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function places()
    {
        return $this->belongsTo('App\Place', 'id_place');
    }

    public function types()
    {
        return $this->belongsTo("App\EventType", "id_event_type");
    }
}

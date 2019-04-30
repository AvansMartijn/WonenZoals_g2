<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaEvent extends Model
{
    protected $fillable = [
        'name', 'description', 'date'
    ];

    //
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_agenda_events', 'event_id')->withPivot('applied');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Meal', 'events_meals', 'meal_id');
    }
}

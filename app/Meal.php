<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'description'
    ];

    public function events()
    {
        return $this->belongsToMany('App\AgendaEvent', 'users_agenda_events', 'user_id', 'event_id');
    }

    
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    //forum
    public function topic()
    {
        return $this->hasMany('App\Topic');
    }

    public function forumpost()
    {
        return $this->hasMany('App\ForumPost');
    }
    //

    public function events()
    {
        return $this->belongsToMany('App\AgendaEvent', 'users_agenda_events', 'user_id', 'event_id')->withPivot('applied');
    }

    //
    public function authorizations()
    {
        return $this->belongsToMany('App\authorizationLookup', 'authorizations', 'user_id', 'authorization_id');
    }

}

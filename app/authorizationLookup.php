<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authorizationLookup extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'authorizations', 'authorization_id', 'user_id');
    }
}

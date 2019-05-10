<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }

    public function forumpost()
    {
        return $this->hasMany('App\ForumPost');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }

    public function topic(){
        return $this->belongsTo('App\Topic');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $fillable = [
        'name', 'img_url', 'link'
    ];
}

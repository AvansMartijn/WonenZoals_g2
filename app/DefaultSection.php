<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultSection extends Model
{
    //
    protected $fillable = [
        'name', 'type_id', 'default_section', 'order', 'content', 'img_url', 'created_at'
    ];
}

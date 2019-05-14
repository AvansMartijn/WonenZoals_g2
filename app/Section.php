<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = [
        'name', 'order', 'content', 'img_url'
    ];

    public function type()
    {
        return $this->hasOne('App\SectionType', 'id', 'type_id');
    }
}

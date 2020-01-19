<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function course()
    {
        return $this->hasMany('App\Course');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}


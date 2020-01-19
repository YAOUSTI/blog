<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}


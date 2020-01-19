<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'category_id', 'description', 'slug'];

    public function category()
    {
        return $this->hasOne('App\Category');
    }
    public function get_image()
    {
        return $this->hasOne('App\Image');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

}

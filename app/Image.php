<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['file_name', 'imageable_type', 'imageable_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

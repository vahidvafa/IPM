<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    public $timestamps = false;

    protected $fillable = ['sourceCode', 'name'];
}

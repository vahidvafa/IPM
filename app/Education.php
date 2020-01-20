<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class education extends Model
{
    use SoftDeletes;


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function document(){
        return $this->hasMany(Document::class);
    }
}


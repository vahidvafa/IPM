<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PassedCoursesCategory extends Model
{
    use  SoftDeletes;


    function user(){
        return $this->belongsTo(User::class);
    }

    function PassedCourses(){
        return $this->hasMany(PassedCourses::class);
    }

}

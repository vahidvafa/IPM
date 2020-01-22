<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PassedCourses extends Model
{
    use SoftDeletes;
    //

    function PassedCoursesCat(){
        return $this->belongsTo(PassedCoursesCategory::class);
    }
}

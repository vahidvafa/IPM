<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\PassedCoursesCategory
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PassedCourses[] $PassedCourses
 * @property-read int|null $passed_courses_count
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory withoutTrashed()
 * @mixin \Eloquent
 */
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

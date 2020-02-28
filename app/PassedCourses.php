<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\PassedCourses
 *
 * @property int $id
 * @property int $passed_courses_category_id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\PassedCoursesCategory $PassedCoursesCat
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses wherePassedCoursesCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses withoutTrashed()
 * @mixin \Eloquent
 */
class PassedCourses extends Model
{
    use SoftDeletes;
    //

//    protected $fillable = ['passed_courses_category_id','title'];

    protected $guarded = ['id'];

    public function PassedCoursesCat(){
        return $this->belongsTo(PassedCoursesCategory::class,"passed_courses_category_id");
    }


    public function user(){
        return $this->belongsToMany(User::class);
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Job
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property int $min_salary
 * @property int $max_salary
 * @property int $expire
 * @property int $province_id
 * @property int $event_category_id
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereMaxSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereMinSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Job withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Job withoutTrashed()
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereLangId($value)
 * @property string $title
 * @property string|null $education
 * @property string|null $location
 * @property string|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Request[] $requests
 * @property-read int|null $requests_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereType($value)
 * @property string|null $contract_type
 * @property string|null $work_experience
 * @property int $jobs_category_id
 * @property int $sex
 * @property string|null $benefits
 * @property int $visibility_count
 * @property string|null $company_logo
 * @property string|null $skills
 * @property-read \App\JobsCategory $jobCategory
 * @property-read \App\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereContractType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereJobsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereVisibilityCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereWorkExperience($value)
 */
class Job extends Model
{
    use SoftDeletes;

//    protected filla
//    protected $fillable = array('*');

protected $guarded = ['id','user_id'];

    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($job) {
            $job->requests->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }


    public function jobCategory()
    {
        return $this->belongsTo(JobsCategory::class,'jobs_category_id',null);
    }


    public function province()
    {
        return $this->belongsTo(Province::class);
    }



}

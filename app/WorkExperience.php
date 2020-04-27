<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\WorkExperience
 *
 * @property int $id
 * @property string $company_name
 * @property string $job_title
 * @property string $from_date
 * @property string $to_date
 * @property string $optional_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereOptionalDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience withoutTrashed()
 * @mixin \Eloquent
 * @property int $user_id
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereUserId($value)
 */
class WorkExperience extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_name', 'job_title', 'from_date', 'to_date', 'optional_description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

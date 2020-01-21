<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\workExperience
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereOptionalDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience withoutTrashed()
 * @mixin \Eloquent
 */
class workExperience extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

}

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
 * @property int $category_id
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
 */
class Job extends Model
{
    use SoftDeletes;
}

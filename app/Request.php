<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Request
 *
 * @property int $id
 * @property int $job_id
 * @property int $user_id
 * @property string $resume_url
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Request onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereResumeUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Request withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Request withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Job $job
 */
class Request extends Model
{
    use SoftDeletes;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

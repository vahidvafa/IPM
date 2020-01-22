<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\JobsCategory
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory withoutTrashed()
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereLangId($value)
 */
class JobsCategory extends Model
{
    use SoftDeletes;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Branch
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Branch onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Branch withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Branch withoutTrashed()
 * @mixin \Eloquent
 */
class Branch extends Model
{
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

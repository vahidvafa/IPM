<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Reservation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withoutTrashed()
 * @mixin \Eloquent
 */
class Reservation extends Model
{
    use SoftDeletes;
}

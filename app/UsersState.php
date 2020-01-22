<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\UsersState
 *
 * @property int $id
 * @property int $user_id
 * @property int $admin_id
 * @property int $state
 * @property string $IP
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState withoutTrashed()
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereLangId($value)
 */
class UsersState extends Model
{
    use SoftDeletes;
}

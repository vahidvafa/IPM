<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MembershipTypesLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $old_price
 * @property string $new_price
 * @property string $old_period
 * @property string $new_period
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereUserId($value)
 * @mixin \Eloquent
 */
class MembershipTypesLog extends Model
{
//    protected $fillable = ['*'];

    protected $guarded = [];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Membership
 *
 * @property int $id
 * @property int $user_id
 * @property int $membership_type_id
 * @property int $start
 * @property int $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\MembershipType $type
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Membership onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereMembershipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Membership withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Membership withoutTrashed()
 * @mixin \Eloquent
 */
class Membership extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'membership_type_id','lang_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(MembershipType::class);
    }
}

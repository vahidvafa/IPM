<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\visibiliy
 *
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $profile_fields
 * @property int $status 0=>deactive | 1=>active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereProfileFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereUserId($value)
 */
class visibiliy extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
}

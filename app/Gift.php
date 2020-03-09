<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Gift
 *
 * @property int $id
 * @property string $code
 * @property float $price
 * @property int $type_id 1 => %  ,  2 => price
 * @property int $maximum_count 0 => unlimited ,  != 0 => limited usage
 * @property int $minimum_price 0 => unlimited ,  != 0 => limited price
 * @property int $maximum_price 0 => unlimited ,  != 0 => limited price
 * @property int $members_usage 0 => only forum users ,  1 => all of users
 * @property int $from_date 0 => unlimited ,  != 0 => limited time
 * @property int $to_date 0 => unlimited ,  != 0 => limited time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UsedGift[] $usedGifts
 * @property-read int|null $used_gifts_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Gift onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMaximumCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMaximumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMembersUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMinimumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gift withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Gift withoutTrashed()
 * @mixin \Eloquent
 * @property int $event_id
 * @property-read mixed $used_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereEventId($value)
 */
class Gift extends Model
{
    use SoftDeletes;

    protected $fillable = ['event_id', 'type_id', 'price', 'maximum_count', 'minimum_price', 'maximum_price', 'members_usage', 'from_date', 'to_date'];

    protected $appends = ['used_count'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function usedGifts()
    {
        return $this->hasMany(UsedGift::class);
    }

    public function getFromDateAttribute($value)
    {
        return (object)['date_time' => tr_num(jdate($value)->format('Y/m/d H:i'), 'fa'), 'unix' => $value];
    }

    public function getToDateAttribute($value)
    {
        return (object)['date_time' => tr_num(jdate($value)->format('Y/m/d H:i'), 'fa'), 'unix' => $value,'test'=>number_format(0.25)];
    }

    public function getUsedCountAttribute()
    {
        return $this->usedGifts()->count();
    }
}

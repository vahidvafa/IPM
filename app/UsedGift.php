<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\UsedGift
 *
 * @property int $id
 * @property int $gift_id
 * @property int $order_id
 * @property int $total_order_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Gift $gift
 * @property-read \App\Order $order
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereGiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereTotalOrderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift withoutTrashed()
 * @mixin \Eloquent
 */
class UsedGift extends Model
{
    use SoftDeletes;

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

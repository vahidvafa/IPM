<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\OrderCode
 *
 * @property int $id
 * @property int $order_id
 * @property int $state_id
 * @property string|null $name
 * @property string|null $mobile
 * @property string|null $email
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Order $order
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode withoutTrashed()
 * @mixin \Eloquent
 */
class OrderCode extends Model
{

    protected $fillable = ['name','en_name', 'mobile', 'email', 'code','picture'];

    use SoftDeletes;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

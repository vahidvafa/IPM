<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function orderCodes()
    {
        return $this->hasMany(OrderCode::class);
    }

    public function Gift()
    {
        return $this->hasOne(UsedGift::class);
    }
}

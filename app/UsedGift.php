<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

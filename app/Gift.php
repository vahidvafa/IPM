<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use SoftDeletes;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function usedGifts()
    {
        return $this->hasMany(UsedGift::class);
    }
}

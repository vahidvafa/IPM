<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Province
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereTitle($value)
 * @mixin \Eloquent
 */
class Province extends Model
{
    public $timestamps = false;
}

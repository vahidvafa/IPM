<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Picture
 *
 * @property int $id
 * @property int $news_id
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\News $news
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Picture onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Picture withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Picture withoutTrashed()
 * @mixin \Eloquent
 */
class Picture extends Model
{
    use SoftDeletes;

    protected $fillable = ['url'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}

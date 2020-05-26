<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\News
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $detail
 * @property string|null $photo
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\News withoutTrashed()
 * @mixin \Eloquent
 * @property int $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Picture[] $pictures
 * @property-read int|null $pictures_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereState($value)
 */
class News extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'detail','photo','state'];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}

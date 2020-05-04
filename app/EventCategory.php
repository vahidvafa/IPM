<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\EventCategory
 *
 * @property int $id
 * @property string $name
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read int|null $event_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\EventCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\EventCategory withoutTrashed()
 * @mixin \Eloquent
 */
class EventCategory extends Model
{
    use SoftDeletes;

    public function event()
    {
        return $this->hasMany(Event::class, 'event_category_id','id');
    }

}

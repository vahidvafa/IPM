<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Event
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $detail
 * @property string|null $course_headings
 * @property string|null $photo
 * @property string $ad_date
 * @property string $solar_date
 * @property string $price
 * @property int $province_id
 * @property string $tel
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property int $event_category_id
 * @property int $creator_uid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Category $category
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereAdDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCourseHeadings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatorUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereSolarDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Event withoutTrashed()
 * @mixin \Eloquent
 * @property string $date
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereLangId($value)
 * @property string $from_date
 * @property string $to_date
 * @property string $start_register_date
 * @property int $user_id
 * @property string $mobile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEventCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereStartRegisterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Gift[] $gifts
 * @property-read int|null $gifts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read int|null $orders_count
 */
class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'detail', 'course_headings', 'from_date', 'to_date', 'start_register_date', 'price', 'province_id', 'tel', 'address', 'latitude', 'longitude', 'event_category_id', 'branch_id', 'branch_id', 'committee_id', 'working_group_id','link'];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, "event_category_id", 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

    public function group()
    {
        return $this->belongsTo(WorkingGroup::class);
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public static function whereCommitteeId($id, $limit = 6)
    {
        return Event::where('committee_id','=',$id)->latest()->limit($limit)->get(['id','title','created_at','photo']);
    }

    public static function whereWorkGroupId($id, $limit = 6)
    {
        return Event::where('working_group_id','=',$id)->latest()->limit($limit)->get(['id','title','created_at','photo']);
    }
    public static function whereBranchId($id, $limit = 6)
    {
        return Event::where('branch_id','=',$id)->latest()->limit($limit)->get(['id','title','created_at','photo']);
    }
}

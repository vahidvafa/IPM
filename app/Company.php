<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Company
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $established_date
 * @property string|null $established_place
 * @property string|null $established_number
 * @property string|null $economy_number
 * @property string|null $national_number
 * @property string|null $post_number
 * @property string|null $ownership_type
 * @property string|null $legal_type
 * @property string|null $address
 * @property string|null $ceo_name
 * @property string|null $ceo_name_en
 * @property string|null $ceo_picture
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCeoNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCeoPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEconomyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEstablishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEstablishedNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEstablishedPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLegalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereNationalNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereOwnershipType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company wherePostNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Company withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'established_date', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

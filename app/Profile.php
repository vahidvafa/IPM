<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property int $sex
 * @property string $father_name
 * @property string $certificate_number
 * @property string $birth_date
 * @property string $birth_place
 * @property string $national_code
 * @property string $work_name
 * @property string $work_address
 * @property string $home_address
 * @property string $work_post
 * @property string $home_post
 * @property string $work_tel
 * @property string $home_tel
 * @property int $receive_place
 * @property string $established_date
 * @property string $established_place
 * @property string $established_number
 * @property string $economy_number
 * @property string $national_number
 * @property string $post_number
 * @property string $ownership_type
 * @property string $legal_type
 * @property string $address
 * @property string $ceo_name
 * @property string $ceo_name_en
 * @property string $ceo_picture
 * @property string $agent_name
 * @property string $agent_name_en
 * @property string $agent_picture
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\User $user
 * @property string|null $youTube
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $telegram
 * @property string|null $twitter
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCertificateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomeTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereReceivePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereYouTube($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withoutTrashed()
 * @mixin \Eloquent
 * @property-read mixed $young
 */
class Profile extends Model
{
    use SoftDeletes;
    protected $fillable = ['sex', 'father_name', 'certificate_number', 'birth_date', 'birth_place', 'national_code', 'work_name', 'work_address', 'home_address', 'work_post', 'home_post', 'work_tel', 'home_tel', 'receive_place'
        , 'established_date', 'established_place', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en', 'ceo_picture', 'agent_name', 'agent_name_en', 'agent_name_en', 'agent_picture',
        "specialized_basins", "certificate",'lang_id'];

//    protected $fillable = ['sex', 'father_name', 'certificate_number', 'birth_date', 'birth_place', 'national_code', 'work_name', 'work_address', 'home_address', 'work_post', 'home_post', 'work_tel', 'home_tel', 'receive_place'
//        , 'established_date', 'established_place', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en', 'ceo_picture', 'agent_name', 'agent_name_en', 'agent_name_en', 'agent_picture', 'lang_id'
//    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $appends = ['young'];

    public function getYoungAttribute()
    {
        $membershipType = MembershipType::find($this->user()->membership_type_id);
        if ($membershipType->exists)
            if ($membershipType->price > 0)
                return checkYoung($this->birth_date);
        return false;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $sex
 * @property string|null $father_name
 * @property string|null $certificate_number
 * @property string|null $birth_date
 * @property string|null $birth_place
 * @property string|null $national_code
 * @property string|null $work_name
 * @property string|null $work_address
 * @property string|null $home_address
 * @property string|null $work_post
 * @property string|null $home_post
 * @property string|null $work_tel
 * @property string|null $home_tel
 * @property int|null $receive_place
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
 * @property string|null $agent_name
 * @property string|null $agent_name_en
 * @property string|null $agent_picture
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAgentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAgentNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAgentPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCeoNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCeoPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCertificateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereEconomyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereEstablishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereEstablishedNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereEstablishedPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHomeTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereLegalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereNationalNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereOwnershipType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePostNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereReceivePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereWorkTel($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use SoftDeletes;
    protected $fillable = ['sex', 'father_name', 'certificate_number', 'birth_date', 'birth_place', 'national_code', 'work_name', 'work_address', 'home_address', 'work_post', 'home_post', 'work_tel', 'home_tel', 'receive_place'
        , 'established_date', 'established_place', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en', 'ceo_picture', 'agent_name', 'agent_name_en', 'agent_name_en', 'agent_picture', 'lang_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

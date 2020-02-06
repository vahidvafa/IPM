<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class Profile extends Model
{

    protected $fillable = ['sex', 'father_name', 'certificate_number', 'birth_date', 'birth_place', 'national_code', 'work_name', 'work_address', 'home_address', 'work_post', 'home_post', 'work_tel', 'home_tel', 'receive_place'
        , 'established_date', 'established_place', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en', 'ceo_picture', 'agent_name', 'agent_name_en', 'agent_name_en', 'agent_picture', 'lang_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

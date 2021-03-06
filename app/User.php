<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $user_code
 * @property string $email
 * @property string $mobile
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $roles
 * @property int $active
 * @property int $reagent_id
 * @property int $branch
 * @property int $expire
 * @property int $membership_type_id
 * @property string|null $profile_picture
 * @property string|null $resume_address
 * @property string|null $about_me
 * @property string|null $shortcomings
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Document[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\education[] $education
 * @property-read int|null $education_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read int|null $event_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Membership[] $memberships
 * @property-read int|null $memberships_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Profile[] $profile
 * @property-read int|null $profile_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\WorkExperience[] $word_experience
 * @property-read int|null $word_experience_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAboutMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMembershipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereReagentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereResumeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereShortcomings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserCode($value)
 * @mixin \Eloquent
 * @property string $first_name
 * @property string $last_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PassedCoursesCategory[] $PassedCoursesCat
 * @property-read int|null $passed_courses_cat_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\visibiliy[] $visibilities
 * @property-read int|null $visibilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\WorkExperience[] $wordExperience
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User like($field, $value)
 * @property string $name_en
 * @property int $branch_id
 * @property int $main
 * @property int $diamond
 * @property int $gold
 * @property int $silver
 * @property int $bronze
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PassedCourses[] $passedCourse
 * @property-read int|null $passed_course_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\WorkExperience[] $workExperience
 * @property-read int|null $work_experience_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBronze($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDiamond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSilver($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name_en', 'email', 'mobile', 'password', 'slug', 'user_code', 'roles', 'reagent_id', 'branch', 'membership_type_id', 'about_me', 'shortcomings', 'profile_picture', 'diamond', 'gold', 'silver', 'bronze'
        ,"isShowMyPhone","active",'main','userCard','resume_address','expire','branch_id','reagent_id','certificate_number','national_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'user_id', 'id');
    }

    public function workExperience()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::Class);
    }

    public function visibilities()
    {
        return $this->hasMany(visibiliy::Class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function passedCourse()
    {
        return $this->hasMany(PassedCourses::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

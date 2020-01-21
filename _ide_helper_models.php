<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Category withoutTrashed()
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Document
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $explain
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\education $education
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereExplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Document withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Document withoutTrashed()
 * @mixin \Eloquent
 */
	class Document extends \Eloquent {}
}

namespace App{
/**
 * App\education
 *
 * @property int $id
 * @property string $education_place
 * @property string $grade
 * @property string $from_date
 * @property string $to_date
 * @property string $gpa
 * @property int $state 0=>reject(reject_text not null ) | 1=> accept
 * @property string $reject_text 0=>reject()
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Document[] $document
 * @property-read int|null $document_count
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\education onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereEducationPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereGpa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereRejectText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\education withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\education withoutTrashed()
 * @mixin \Eloquent
 */
	class education extends \Eloquent {}
}

namespace App{
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
 * @property int $category_id
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
 */
	class Event extends \Eloquent {}
}

namespace App{
/**
 * App\Job
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property int $min_salary
 * @property int $max_salary
 * @property int $expire
 * @property int $province_id
 * @property int $category_id
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereMaxSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereMinSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Job withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Job withoutTrashed()
 */
	class Job extends \Eloquent {}
}

namespace App{
/**
 * App\JobsCategory
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\JobsCategory withoutTrashed()
 */
	class JobsCategory extends \Eloquent {}
}

namespace App{
/**
 * App\Membership
 *
 * @property int $id
 * @property int $user_id
 * @property int $membership_type_id
 * @property int $start
 * @property int $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\MembershipType $type
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Membership onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereMembershipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Membership withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Membership withoutTrashed()
 */
	class Membership extends \Eloquent {}
}

namespace App{
/**
 * App\MembershipType
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property int $period
 * @property string|null $required_documents
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Membership[] $memberships
 * @property-read int|null $memberships_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereRequiredDocuments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereUpdatedAt($value)
 */
	class MembershipType extends \Eloquent {}
}

namespace App{
/**
 * App\MembershipTypesLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $old_price
 * @property string $new_price
 * @property string $old_period
 * @property string $new_period
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereUserId($value)
 */
	class MembershipTypesLog extends \Eloquent {}
}

namespace App{
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
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\Request
 *
 * @property int $id
 * @property int $job_id
 * @property int $user_id
 * @property string $resume_url
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Request onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereResumeUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Request whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Request withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Request withoutTrashed()
 */
	class Request extends \Eloquent {}
}

namespace App{
/**
 * App\Reservation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withoutTrashed()
 */
	class Reservation extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\workExperience[] $word_experience
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
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UsersState
 *
 * @property int $id
 * @property int $user_id
 * @property int $admin_id
 * @property int $state
 * @property string $IP
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\UsersState withoutTrashed()
 */
	class UsersState extends \Eloquent {}
}

namespace App{
/**
 * App\workExperience
 *
 * @property int $id
 * @property string $company_name
 * @property string $job_title
 * @property string $from_date
 * @property string $to_date
 * @property string $optional_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereOptionalDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\workExperience withoutTrashed()
 */
	class workExperience extends \Eloquent {}
}


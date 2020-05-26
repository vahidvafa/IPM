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
	class Company extends \Eloquent {}
}

namespace App{
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
 * @property string|null $honors
 * @property string|null $certificate
 * @property string|null $awards
 * @property string|null $specialized_basins
 * @property string|null $upgrade_update_data
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAwards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereHonors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereSpecializedBasins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpgradeUpdateData($value)
 */
	class Profile extends \Eloquent {}
}

namespace App{
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
	class EventCategory extends \Eloquent {}
}

namespace App{
/**
 * App\Committee
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Committee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Committee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Committee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Committee withoutTrashed()
 */
	class Committee extends \Eloquent {}
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
 * @property int|null $branch_id
 * @property int|null $committee_id
 * @property int|null $working_group_id
 * @property string|null $link
 * @property-read \App\Branch|null $branch
 * @property-read \App\Committee|null $committee
 * @property-read \App\WorkingGroup $group
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCommitteeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereWorkingGroupId($value)
 */
	class Event extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property string $old_second_price
 * @property string $new_second_price
 * @property string $old_title
 * @property string $new_title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewSecondPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereNewTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldSecondPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipTypesLog whereOldTitle($value)
 */
	class MembershipTypesLog extends \Eloquent {}
}

namespace App{
/**
 * App\PassedCourses
 *
 * @property int $id
 * @property int $passed_courses_category_id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\PassedCoursesCategory $PassedCoursesCat
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses wherePassedCoursesCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCourses withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @property-read int|null $user_count
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCourses whereUserId($value)
 */
	class PassedCourses extends \Eloquent {}
}

namespace App{
/**
 * App\Gift
 *
 * @property int $id
 * @property string $code
 * @property float $price
 * @property int $type_id 1 => %  ,  2 => price
 * @property int $maximum_count 0 => unlimited ,  != 0 => limited usage
 * @property int $minimum_price 0 => unlimited ,  != 0 => limited price
 * @property int $maximum_price 0 => unlimited ,  != 0 => limited price
 * @property int $members_usage 0 => only forum users ,  1 => all of users
 * @property int $from_date 0 => unlimited ,  != 0 => limited time
 * @property int $to_date 0 => unlimited ,  != 0 => limited time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UsedGift[] $usedGifts
 * @property-read int|null $used_gifts_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Gift onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMaximumCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMaximumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMembersUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereMinimumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gift withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Gift withoutTrashed()
 * @mixin \Eloquent
 * @property int $event_id
 * @property-read mixed $used_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gift whereEventId($value)
 */
	class Gift extends \Eloquent {}
}

namespace App{
/**
 * App\Message
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $detail
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Message onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Message withoutTrashed()
 * @mixin \Eloquent
 */
	class Message extends \Eloquent {}
}

namespace App{
/**
 * App\Branch
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Branch onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Branch withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Branch withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 */
	class Branch extends \Eloquent {}
}

namespace App{
/**
 * App\OrderCode
 *
 * @property int $id
 * @property int $order_id
 * @property int $state_id
 * @property string|null $name
 * @property string|null $mobile
 * @property string|null $email
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Order $order
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\OrderCode withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $picture
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCode wherePicture($value)
 */
	class OrderCode extends \Eloquent {}
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
 * @property int $isShowMyPhone 0=> false | 1=> true
 * @property string|null $userCard
 * @property int $reminder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsShowMyPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserCard($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\WorkingGroup
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkingGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkingGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WorkingGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkingGroup withoutTrashed()
 */
	class WorkingGroup extends \Eloquent {}
}

namespace App{
/**
 * App\PassedCoursesCategory
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PassedCourses[] $PassedCourses
 * @property-read int|null $passed_courses_count
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PassedCoursesCategory whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\PassedCoursesCategory withoutTrashed()
 * @mixin \Eloquent
 */
	class PassedCoursesCategory extends \Eloquent {}
}

namespace App{
/**
 * App\visibiliy
 *
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $profile_fields
 * @property int $status 0=>deactive | 1=>active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereProfileFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\visibiliy whereUserId($value)
 */
	class visibiliy extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereLangId($value)
 * @property int $state_id
 * @property int $year
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Membership whereYear($value)
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
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereLangId($value)
 * @property string|null $second_price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereSecondPrice($value)
 */
	class MembershipType extends \Eloquent {}
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
 * @property int $user_id
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\education whereUserId($value)
 * @property string $field_of_study
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereFieldOfStudy($value)
 */
	class Education extends \Eloquent {}
}

namespace App{
/**
 * App\IPMA
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA query()
 * @mixin \Eloquent
 * @property string $head_title
 * @property string $head_subtitle
 * @property string $head_description
 * @property string $address
 * @property string $tel
 * @property string $fax
 * @property string $secretariat_email
 * @property string $membership_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereHeadDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereHeadSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereHeadTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereMembershipEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereSecretariatEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereUpdatedAt($value)
 * @property int|null $event_id
 * @property int|null $news_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IPMA whereNewsId($value)
 */
	class IPMA extends \Eloquent {}
}

namespace App{
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
	class News extends \Eloquent {}
}

namespace App{
/**
 * App\MainPageSponsor
 *
 * @property int $id
 * @property string $url
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MainPageSponsor whereUrl($value)
 */
	class MainPageSponsor extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersState whereLangId($value)
 */
	class UsersState extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property-read \App\Job $job
 */
	class Request extends \Eloquent {}
}

namespace App{
/**
 * App\WorkExperience
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereOptionalDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WorkExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\WorkExperience withoutTrashed()
 * @mixin \Eloquent
 * @property int $user_id
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\workExperience whereUserId($value)
 */
	class WorkExperience extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property int $state_id 0 => payment pending , 1 => successful , 2=> failed
 * @property int $total_price
 * @property string|null $reference_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\UsedGift $Gift
 * @property-read \App\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderCode[] $orderCodes
 * @property-read int|null $order_codes_count
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Order withoutTrashed()
 * @mixin \Eloquent
 * @property int $type_id 0 => event , 1 => register , 2 => upgrade . 3 => repeat
 * @property string|null $comment explain about order
 * @property string|null $reference_number bank reference number
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTypeId($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Lang
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Lang extends \Eloquent {}
}

namespace App{
/**
 * App\UsedGift
 *
 * @property int $id
 * @property int $gift_id
 * @property int $order_id
 * @property int $total_order_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Gift $gift
 * @property-read \App\Order $order
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereGiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereTotalOrderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsedGift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\UsedGift withoutTrashed()
 * @mixin \Eloquent
 */
	class UsedGift extends \Eloquent {}
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
 * @property int $event_category_id
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
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereLangId($value)
 * @property string $title
 * @property string|null $education
 * @property string|null $location
 * @property string|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Request[] $requests
 * @property-read int|null $requests_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereType($value)
 * @property string|null $contract_type
 * @property string|null $work_experience
 * @property int $jobs_category_id
 * @property int $sex
 * @property string|null $benefits
 * @property int $visibility_count
 * @property string|null $company_logo
 * @property string|null $skills
 * @property-read \App\JobsCategory $jobCategory
 * @property-read \App\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereContractType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereJobsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereVisibilityCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereWorkExperience($value)
 * @property int $jobsCategory_id
 */
	class Job extends \Eloquent {}
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
 * @mixin \Eloquent
 */
	class Reservation extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobsCategory whereLangId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Job[] $job
 * @property-read int|null $job_count
 */
	class JobsCategory extends \Eloquent {}
}

namespace App{
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
	class Picture extends \Eloquent {}
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
 * @property int $lang_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereLangId($value)
 * @property-read \App\User $user
 */
	class Document extends \Eloquent {}
}

namespace App{
/**
 * App\Province
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\Job $job
 */
	class Province extends \Eloquent {}
}


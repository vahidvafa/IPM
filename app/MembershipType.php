<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class MembershipType extends Model
{
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}

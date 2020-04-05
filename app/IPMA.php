<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class IPMA extends Model
{
//    protected $fillable = ['head_subtitle','head_description','head_title','event_id'];
protected $fillable = ['*'];

protected $guarded = ['id'];

}

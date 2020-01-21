<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class education extends Model
{
    use SoftDeletes;


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function document(){
        return $this->hasMany(Document::class);
    }
}


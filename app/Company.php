<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'established_date', 'established_number', 'economy_number', 'national_number', 'post_number', 'ownership_type', 'legal_type', 'address', 'ceo_name', 'ceo_name_en'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

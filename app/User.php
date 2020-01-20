<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        return $this->hasMany(Membership::class);
    }

    public function word_experience()
    {
        return $this->hasMany(workExperience::class);
    }

    public function education()
    {
        return $this->hasMany(education::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }


}

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
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'image_loft',
        'name_loft',
        'lng_loft',
        'lat_loft',
        'type_user',
        'country_user',
        'is_active'
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
        'lng_loft' => 'double',
        'lat_loft' => 'double',
    ];

    public function clubs()
    {
        return $this->hasMany('App\Clubs','id');
    }

    public function club_members()
    {
        return $this->hasMany('App\ClubMember','id');
    }

    public function manager_club()
    {
        return $this->hasMany('App\Clubs','id');
    }

    public function team()
    {
        return $this->hasMany('App\Team','id');
    }

    public function pigeons()
    {
        return $this->hasMany('App\Pigeons','id');
    }

    public function operator_clubs()
    {
        return $this->hasMany('App\OperatorClubs','id');
    }

    public function event()
    {
        return $this->hasMany('App\Events','id');
    }
    
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pigeons extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'pigeons';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'uid_pigeon',
        'ring_size_pigeon',
        'id_user',
        'id_club',
        'name_pigeon',
        'sex_pigeon',
        'color_pigeon',
        'is_active'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
    public function club()
    {
        return $this->belongsTo('App\Clubs', 'id_club','id');
    }
    // public function club_member()
    // {
    //     return $this->hasMany('App\ClubMember','id_pigeon');
    // }
    public function team_member()
    {
        return $this->hasMany('App\TeamMembers','id_pigeon');
    }
    public function Event_participants()
    {
        return $this->hasMany('App\EventParticipants', 'id_pigeon', 'id_pigeon');
    }
    public function loft_member()
    {
        return $this->belongsTo('App\Clubs', 'id_pigeon','id');
    }
}

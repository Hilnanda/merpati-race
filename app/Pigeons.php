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
        'name_pigeon',
        'sex_pigeon',
        'color_pigeon',
        'is_active'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
    public function club_member()
    {
        return $this->hasMany('App\ClubMember','id_pigeon');
    }
    public function team_member()
    {
        return $this->hasMany('App\TeamMembers','id_pigeon');
    }
    public function pigeons_participants()
    {
        return $this->hasMany('App\EventParticipants', 'id_pigeons', 'id_pigeons');
    }
}

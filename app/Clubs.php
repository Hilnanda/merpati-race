<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'clubs';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'name_club',
        'address_club',
        'manager_club'
    ];
    
    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_club', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function club_member()
    {
        return $this->hasMany('App\ClubMember','id_club');
    }

    public function pigeons()
    {
        return $this->hasMany('App\Pigeons','id_club');
    }

    public function operator_clubs()
    {
        return $this->hasMany('App\OperatorClubs','id','id_club');
    }

    public function event()
    {
        return $this->hasMany('App\Events','id_club');
    }

    public function event_participants()
    {
        return $this->hasMany('App\EventParticipants','current_id_club');
    }
}

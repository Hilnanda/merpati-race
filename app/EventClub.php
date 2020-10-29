<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventClub extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_clubs';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name',
        'logo',
        'info',
        'lat',
        'lng',
        'address',
        'release_time',
        'expired_time',
    ];
    
    public function event_club_participant()
    {
        return $this->hasMany('App\EventClubParticipant','id');
    }
}

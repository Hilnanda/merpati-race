<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventClubParticipant extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_club_participants';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_pigeon',
        'id_event',
        'is_core',
        'baketed_at',
        'current_id_club',
        'current_id_team',
        'active_at'
    ];
    
    public function pigeons()
    {
        return $this->belongsTo('App\Pigeons', 'id_pigeon','id');
    }

    public function event_club()
    {
        return $this->belongsTo('App\EventClub', 'id_event_club','id');
    }

    public function event_club_result()
    {
        return $this->hasMany('App\EventClubResult','id');
    }
}

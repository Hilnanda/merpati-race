<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventClubResult extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_club_results';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'speed',
        'id_event_club_participant',
        'current_id_club',
        'current_id_team'
    ];

    public function event_participants()
    {
        return $this->belongsTo('App\EventParticipants', 'id_event_participant','id');
    }
}

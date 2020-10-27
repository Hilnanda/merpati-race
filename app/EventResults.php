<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventResults extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_results';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'speed_event_result',
        'id_event_participant',
        'current_id_club',
        'current_id_team'
    ];

    public function event_participants()
    {
        return $this->belongsTo('App\EventParticipants', 'id_event_participant','id');
    }
    
}

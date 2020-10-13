<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsResults extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'events_results';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'speed_event_result',
        'id_event_participant'];
    public function events_participants()
    {
        return $this->belongsTo('App\EventsParticipants', 'id','id_event_participant');
    }
    
}

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
        'arrived_at',
        'id_event_participant',
        'id_event_hotspot'
    ];

    public function event_participant()
    {
        return $this->belongsTo('App\EventParticipants', 'id_event_participant','id');
    }

    public function event_hotspot()
    {
        return $this->belongsTo('App\EventHotspot', 'id_event_hotspot','id');
    }
}

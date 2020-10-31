<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventHotspot extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_hotspots';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_event',
        'release_time_hotspot',
        'expired_time_hotspot'
    ];

    public function events()
    {
        return $this->belongsTo('App\Events', 'id_event','id');
    }

    public function event_results()
    {
        return $this->hasMany('App\EventResults','id');
    }
}

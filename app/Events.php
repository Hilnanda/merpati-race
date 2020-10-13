<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'events';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_event',
        'info_event',
        'lat_event',
        'lng_event',
        'address_event',
        'release_time_event',
        'expired_time_event'];
    public function clubs()
    {
        return $this->belongsTo('App\Clubs', 'id','id_club');
    }
    public function events_participants()
    {
        return $this->hasMany('App\EventsParticipants','id');
    }
}

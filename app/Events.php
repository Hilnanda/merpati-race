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
        'logo_event',
        'info_event',
        'category_event',
        'lat_event',
        'lng_event',
        'lat_event_end',
        'lng_event_end',
        'address_event',
        'release_time_event',
        'due_join_date_event',
        'expired_time_event',
        'price_event'
    ];
    
    public function event_participants()
    {
        return $this->hasMany('App\EventParticipants','id');
    }

    public function club()
    {
        return $this->belongsTo('App\Clubs', 'id_club','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
}

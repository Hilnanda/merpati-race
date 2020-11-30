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
        'hotspot_length_event',
        'branch_event',
        'id_loft',
        'id_club',
        'id_user',
        'category_event',
        'lat_event',
        'lng_event',
        'lat_event_end',
        'lng_event_end',
        'address_event',
        'due_join_date_event',
        'price_event',
        'country_event'
    ];
    
    public function event_participants()
    {
        return $this->hasMany('App\EventParticipants','id_event');
    }

    public function event_hotspot()
    {
        return $this->hasMany('App\EventHotspot','id_event')->orderBy('release_time_hotspot', 'asc');
    }

    public function hardware()
    {
        return $this->hasMany('App\Hardware','id_event');
    }

    public function club()
    {
        return $this->belongsTo('App\Clubs', 'id_club','id');
    }

    public function loft()
    {
        return $this->belongsTo('App\Loft', 'id_loft','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
}

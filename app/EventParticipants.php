<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipants extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'event_participants';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_pigeon',
        'id_event',
        'is_core',
        'current_id_club',
        'current_id_team',
        'active_at'
    ];
    
    public function pigeons()
    {
        return $this->belongsTo('App\Pigeons', 'id_pigeon','id');
    }

    public function events()
    {
        return $this->belongsTo('App\Events', 'id_event','id');
    }

    public function event_results()
    {
        return $this->hasMany('App\EventResults','id_event_participant');
    }

    public function club()
    {
        return $this->belongsTo('App\Clubs', 'current_id_club','id');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'current_id_team','id');
    }
}

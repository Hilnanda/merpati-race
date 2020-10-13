<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsParticipants extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'events_participants';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_pigeon',
        'id_event'
        ];
    public function pigeons()
    {
        return $this->belongsTo('App\Pigeons', 'id','id_pigeon');
    }

    public function events()
    {
        return $this->belongsTo('App\Events', 'id','id_event');
    }

    public function events_results()
    {
        return $this->hasMany('App\EventsResults','id');
    }
}

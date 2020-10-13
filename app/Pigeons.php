<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pigeons extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'pigeons';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'uid_pigeon',
        'id_club',
        'name_pigeon',
        'sex_pigeon',
        'color_pigeon'];
    public function clubs()
    {
        return $this->belongsTo('App\Clubs', 'id','id_club');
    }
    public function events_participants()
    {
        return $this->hasMany('App\EventsParticipants','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'teams';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_team',
        'desc_team'
    ];
    // public function clubs()
    // {
    //     return $this->belongsTo('App\Clubs', 'id_club','id');
    // }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
}

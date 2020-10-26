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
        'id_user',
        'name_team',
        'desc_team',
        'is_active'
    ];
    // public function clubs()
    // {
    //     return $this->belongsTo('App\Clubs', 'id_club','id');
    // }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }
    public function team_member()
    {
        return $this->hasMany('App\TeamMembers','id');
    }
}

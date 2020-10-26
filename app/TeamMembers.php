<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'teams';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_team',
        'id_club',
        'name_team',
        'desc_team'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team', 'id_team','id');
    }
}

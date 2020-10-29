<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'team_members';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_team',
        'id_pigeon',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team', 'id_team','id');
    }
    public function pigeon()
    {
        return $this->belongsTo('App\Pigeons', 'id_pigeon','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubMember extends Model
{
    //
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'club_members';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_club',
        'id_user',
        'id_pigeon',
        'is_active'
    ];

    public function club()
    {
        return $this->belongsTo('App\Clubs', 'id_club', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    // public function pigeon()
    // {
    //     return $this->belongsTo('App\Pigeons', 'id_pigeon', 'id');
    // }
}

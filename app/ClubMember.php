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
        'id_pigeons',
        'is_active'
    ];

}

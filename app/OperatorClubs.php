<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatorClubs extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'operator_clubs';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'id_club'
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function clubs()
    {
        return $this->belongsTo('App\Clubs', 'id_club', 'id');
    }
}

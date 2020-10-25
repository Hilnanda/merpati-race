<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'clubs';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'name_club',
        'lat_club',
        'lng_club',
        'address_club',
        'manager_club'
    ];
    public function pigeons()
    {
        return $this->hasMany('App\Pigeons', 'id');
    }
    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_club', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}

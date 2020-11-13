<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoftMember extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'loft_members';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_loft',
        'id_pigeon',
        'is_active'
    ];
    public function loft()
    {
        return $this->belongsTo('App\Loft', 'id_loft', 'id');
    }
    public function pigeon()
    {
        return $this->belongsTo('App\Pigeons', 'id_pigeon', 'id');
    }
}

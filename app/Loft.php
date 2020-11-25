<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loft extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'lofts';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'name_loft',
        'logo_loft',
        'country_loft'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function loft_member()
    {
        return $this->hasMany('App\LoftMember','id_loft')->where('is_active', true);
    }

    public function event()
    {
        return $this->hasMany('App\Events','id_loft');
    }
}

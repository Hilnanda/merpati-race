<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'hardware';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'uid_hardware',
        'id_user',
        'id_event',
        'label_hardware',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user','id');
    }

    public function event()
    {
        return $this->belongsTo('App\Events', 'id_event','id');
    }
}

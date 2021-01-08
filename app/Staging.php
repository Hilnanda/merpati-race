<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staging extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'staging';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'uid_hardware',
        'uid_pigeon',
        'tanggal_hardware',
        'latlong_hardware'
        
    ];

}

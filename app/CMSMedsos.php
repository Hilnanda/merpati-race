<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSMedsos extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_medsos';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_medsos',
        'url_medsos',
        'username_medsos',
        'icon_medsos'
        ];
}

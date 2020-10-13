<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSFooter extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_footer';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_copyright'
        ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSHeader extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_header';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_website',
        'name_corousel',
        'image_corousel'
        ];
}

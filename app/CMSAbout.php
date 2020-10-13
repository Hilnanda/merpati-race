<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSAbout extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_about';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'title_about',
        'image_about',
        'desc_about'
        ];
}

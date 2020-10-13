<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSNews extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_news';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'title_news',
        'image_news',
        'desc_news',
        'date_news'
        ];
}

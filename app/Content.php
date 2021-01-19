<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_content';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'image_content',
        'title_content'
        ];
}

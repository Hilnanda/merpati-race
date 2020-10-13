<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSProduct extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_product';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'name_product',
        'desc_product',
        'price_product'
        ];
}

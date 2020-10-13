<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSContact extends Model
{
    protected $primaryKey = 'id';
    //deklarasikan nama tabel di db
    protected $table = 'cms_contact';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'address_contact',
        'customer_contact'
        ];
}

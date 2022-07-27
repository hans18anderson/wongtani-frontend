<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
    protected $table = 'produk';
    protected $fillable = ['nama','deskripsi'];

    public function Prod()
    {
        return $this->hasMany('App\produk_jual');
    }
}


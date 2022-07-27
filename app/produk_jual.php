<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk_jual extends Model
{
    protected $table = 'produk_jual';
    protected $fillable = ['harga','stok'];

    public function Produk()
    {
        return $this->belongsTo('App\Produk');
    }
}


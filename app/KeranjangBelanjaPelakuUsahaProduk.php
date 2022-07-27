<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $keranjang_belanja_pelaku_usaha_id
 * @property int $produk_jual_id
 * @property int $jumlah
 * @property KeranjangBelanjaPelakuUsaha $keranjangBelanjaPelakuUsaha
 * @property ProdukJual $produkJual
 */
class KeranjangBelanjaPelakuUsahaProduk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'keranjang_belanja_pelaku_usaha_produk';

    /**
     * @var array
     */
    protected $fillable = ['keranjang_belanja_pelaku_usaha_id', 'produk_jual_id', 'jumlah'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keranjangBelanjaPelakuUsaha()
    {
        return $this->belongsTo('App\KeranjangBelanjaPelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkJual()
    {
        return $this->belongsTo('App\ProdukJual');
    }
}

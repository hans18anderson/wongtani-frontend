<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $keranjang_belanja_petani_id
 * @property int $produk_tanam_id
 * @property int $jumlah
 * @property KeranjangBelanjaPetani $keranjangBelanjaPetani
 * @property ProdukTanam $produkTanam
 */
class KeranjangBelanjaPetaniProduk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'keranjang_belanja_petani_produk';

    /**
     * @var array
     */
    protected $fillable = ['keranjang_belanja_petani_id', 'produk_tanam_id', 'jumlah'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keranjangBelanjaPetani()
    {
        return $this->belongsTo('App\KeranjangBelanjaPetani');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkTanam()
    {
        return $this->belongsTo('App\ProdukTanam');
    }
}

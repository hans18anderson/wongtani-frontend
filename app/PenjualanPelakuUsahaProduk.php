<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_jual_id
 * @property int $penjualan_pelaku_usaha_id
 * @property int $jumlah
 * @property string $harga_jual
 * @property string $catatan
 * @property PenjualanPelakuUsaha $penjualanPelakuUsaha
 * @property ProdukJual $produkJual
 */
class PenjualanPelakuUsahaProduk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan_pelaku_usaha_produk';

    /**
     * @var array
     */
    protected $fillable = ['produk_jual_id', 'penjualan_pelaku_usaha_id', 'jumlah', 'harga_jual', 'catatan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualanPelakuUsaha()
    {
        return $this->belongsTo('App\PenjualanPelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkJual()
    {
        return $this->belongsTo('App\produk_jual');
    }
}

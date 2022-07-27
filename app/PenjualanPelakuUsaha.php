<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pelaku_usaha_id
 * @property int $promosi_id
 * @property int $pengiriman_id
 * @property int $alamat_kirim_id
 * @property int $penjualan_id
 * @property string $nomor_invoice
 * @property string $keterangan
 * @property PelakuUsaha $pelakuUsaha
 * @property KonsumenAlamatKirim $konsumenAlamatKirim
 * @property Promosi $promosi
 * @property Penjualan $penjualan
 * @property Pengiriman $pengiriman
 * @property PenjualanPelakuUsahaProduk[] $penjualanPelakuUsahaProduks
 * @property PenjualanPelakuUsahaStatus[] $penjualanPelakuUsahaStatuses
 */
class PenjualanPelakuUsaha extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan_pelaku_usaha';

    /**
     * @var array
     */
    protected $fillable = ['pelaku_usaha_id', 'promosi_id', 'pengiriman_id', 'alamat_kirim_id', 'penjualan_id', 'nomor_invoice', 'keterangan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function konsumenAlamatKirim()
    {
        return $this->belongsTo('App\KonsumenAlamatKirim', 'alamat_kirim_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promosi()
    {
        return $this->belongsTo('App\Promosi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualan()
    {
        return $this->belongsTo('App\Penjualan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengiriman()
    {
        return $this->belongsTo('App\Pengiriman');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahaProduks()
    {
        return $this->hasMany('App\PenjualanPelakuUsahaProduk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahaStatuses()
    {
        return $this->hasMany('App\PenjualanPelakuUsahaStatus');
    }
}

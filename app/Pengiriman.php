<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $kurir_id
 * @property int $pengiriman_kategori_id
 * @property int $pelaku_usaha_id
 * @property int $tarif
 * @property PengirimanKategori $pengirimanKategori
 * @property Kurir $kurir
 * @property PelakuUsaha $pelakuUsaha
 * @property PenjualanPelakuUsaha[] $penjualanPelakuUsahas
 */
class Pengiriman extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengiriman';

    /**
     * @var array
     */
    protected $fillable = ['kurir_id', 'pengiriman_kategori_id', 'pelaku_usaha_id', 'tarif'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengirimanKategori()
    {
        return $this->belongsTo('App\PengirimanKategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kurir()
    {
        return $this->belongsTo('App\Kurir');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahas()
    {
        return $this->hasMany('App\PenjualanPelakuUsaha');
    }
}

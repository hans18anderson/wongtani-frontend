<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $penjualan_pelaku_usaha_id
 * @property int $penjualan_status_kategori_id
 * @property string $tanggal
 * @property string $keterangan
 * @property string $status
 * @property PenjualanPelakuUsaha $penjualanPelakuUsaha
 * @property PenjualanStatusKategori $penjualanStatusKategori
 */
class PenjualanPelakuUsahaStatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan_pelaku_usaha_status';

    /**
     * @var array
     */
    protected $fillable = ['penjualan_pelaku_usaha_id', 'penjualan_status_kategori_id', 'tanggal', 'keterangan', 'status'];

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
    public function penjualanStatusKategori()
    {
        return $this->belongsTo('App\PenjualanStatusKategori');
    }
}

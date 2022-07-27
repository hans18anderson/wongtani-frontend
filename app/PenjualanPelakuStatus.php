<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $penjualan_petani_id
 * @property int $penjualan_status_kategori_id
 * @property string $tanggal
 * @property string $keterangan
 * @property string $status
 * @property PenjualanPelakuUsaha $penjualanPelakuUsaha
 * @property PenjualanStatusKategori $penjualanStatusKategori
 */
class PenjualanPelakuStatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan_status';

    /**
     * @var array
     */
    protected $fillable = ['penjualan_petani_id', 'penjualan_status_kategori_id', 'tanggal', 'keterangan', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualanPelakuUsaha()
    {
        return $this->belongsTo('App\PenjualanPelakuUsaha', 'penjualan_petani_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualanStatusKategori()
    {
        return $this->belongsTo('App\PenjualanStatusKategori');
    }
}

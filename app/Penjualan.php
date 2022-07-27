<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $konsumen_id
 * @property string $nomor_invoice
 * @property string $tanggal_transaksi
 * @property Konsuman $konsuman
 * @property PenjualanPelakuUsaha[] $penjualanPelakuUsahas
 */
class Penjualan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan';

    /**
     * @var array
     */
    protected $fillable = ['konsumen_id', 'nomor_invoice', 'tanggal_transaksi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function konsuman()
    {
        return $this->belongsTo('App\Konsuman', 'konsumen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahas()
    {
        return $this->hasMany('App\PenjualanPelakuUsaha');
    }
}

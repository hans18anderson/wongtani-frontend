<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property PenjualanPelakuUsahaStatus[] $penjualanPelakuUsahaStatuses
 */
class PenjualanStatusKategori extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penjualan_status_kategori';

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahaStatuses()
    {
        return $this->hasMany('App\PenjualanPelakuUsahaStatus');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_tanam_id
 * @property string $tanggal
 * @property string $keterangan
 * @property int $jumlah
 * @property int $nominal_biaya
 * @property int $bahan_id
 * @property ProdukTanam $produkTanam
 */
class ProdukTanamPemeliharaan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_tanam_pemeliharaan';

    /**
     * @var array
     */
    protected $fillable = ['produk_tanam_id', 'tanggal', 'keterangan', 'jumlah', 'nominal_biaya', 'bahan_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkTanam()
    {
        return $this->belongsTo('App\ProdukTanam');
    }
}

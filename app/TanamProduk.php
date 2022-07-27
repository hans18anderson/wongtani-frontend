<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_id
 * @property int $tanam_id
 * @property string $keterangan
 * @property int $status
 * @property int $harga_pokok_produksi
 * @property Produk $produk
 * @property Tanam $tanam
 */
class TanamProduk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tanam_produk';

    /**
     * @var array
     */
    protected $fillable = ['produk_id', 'tanam_id', 'keterangan', 'status', 'harga_pokok_produksi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tanam()
    {
        return $this->belongsTo('App\Tanam');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_produk
 * @property int $id_tanam
 * @property string $keterangan
 * @property int $status
 * @property int $harga_pokok_produksi
 * @property Produk $produk
 * @property Tanam $tanam
 * @property ProdukTanamPerkembangan[] $produkTanamPerkembangans
 */
class ProdukTanam extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_tanam';

    /**
     * @var array
     */
    protected $fillable = ['id_produk', 'id_tanam', 'keterangan', 'status', 'harga_pokok_produksi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tanam()
    {
        return $this->belongsTo('App\Tanam', 'id_tanam');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkTanamPerkembangans()
    {
        return $this->hasMany('App\ProdukTanamPerkembangan');
    }
}

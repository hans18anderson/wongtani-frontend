<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_tanam_id
 * @property int $status_tanam_id
 * @property string $tanggal_mulai
 * @property int $jumlah
 * @property string $keterangan
 * @property int $status
 * @property ProdukTanam $produkTanam
 * @property StatusTanam $statusTanam
 * @property ProdukTanamPerkembanganFoto[] $produkTanamPerkembanganFotos
 */
class ProdukTanamPerkembangan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_tanam_perkembangan';

    /**
     * @var array
     */
    protected $fillable = ['produk_tanam_id', 'status_tanam_id', 'tanggal_mulai', 'jumlah', 'keterangan', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkTanam()
    {
        return $this->belongsTo('App\ProdukTanam');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusTanam()
    {
        return $this->belongsTo('App\StatusTanam');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkTanamPerkembanganFotos()
    {
        return $this->hasMany('App\ProdukTanamPerkembanganFoto');
    }
}

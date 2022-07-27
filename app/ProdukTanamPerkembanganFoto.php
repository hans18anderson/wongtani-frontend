<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_tanam_perkembangan_id
 * @property string $url_file
 * @property string $deskripsi
 * @property ProdukTanamPerkembangan $produkTanamPerkembangan
 */
class ProdukTanamPerkembanganFoto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_tanam_perkembangan_foto';

    /**
     * @var array
     */
    protected $fillable = ['produk_tanam_perkembangan_id', 'url_file', 'deskripsi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkTanamPerkembangan()
    {
        return $this->belongsTo('App\ProdukTanamPerkembangan');
    }
}

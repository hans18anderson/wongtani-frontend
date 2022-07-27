<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_id
 * @property string $nama
 * @property string $path
 * @property Produk $produk
 */
class ProdukFoto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_foto';

    /**
     * @var array
     */
    protected $fillable = ['produk_id', 'nama', 'path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }
}

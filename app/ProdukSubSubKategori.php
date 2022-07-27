<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_sub_kategori_id
 * @property string $nama
 * @property ProdukSubKategori $produkSubKategori
 * @property Produk[] $produks
 */
class ProdukSubSubKategori extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_sub_sub_kategori';

    /**
     * @var array
     */
    protected $fillable = ['produk_sub_kategori_id', 'nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkSubKategori()
    {
        return $this->belongsTo('App\ProdukSubKategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks()
    {
        return $this->hasMany('App\Produk');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_kategori_id
 * @property string $nama
 * @property ProdukKategori $produkKategori
 * @property ProdukSubSubKategori[] $produkSubSubKategoris
 */
class ProdukSubKategori extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_sub_kategori';

    /**
     * @var array
     */
    protected $fillable = ['produk_kategori_id', 'nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkKategori()
    {
        return $this->belongsTo('App\ProdukKategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkSubSubKategoris()
    {
        return $this->hasMany('App\ProdukSubSubKategori');
    }
}

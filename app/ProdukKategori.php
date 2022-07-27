<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property ProdukSubKategori[] $produkSubKategoris
 */
class ProdukKategori extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk_kategori';

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkSubKategoris()
    {
        return $this->hasMany('App\ProdukSubKategori');
    }
}

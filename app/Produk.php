<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $produk_sub_sub_kategori_id
 * @property int $pelaku_usaha_id
 * @property int $satuan_id
 * @property int $brand_id
 * @property string $nama
 * @property string $deskripsi
 * @property Satuan $satuan
 * @property ProdukSubSubKategori $produkSubSubKategori
 * @property Brand $brand
 * @property PelakuUsaha $pelakuUsaha
 * @property ProdukJual[] $produkJuals
 * @property ProdukTanam[] $produkTanams
 */
class Produk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk';

    /**
     * @var array
     */
  
    protected $fillable = ['produk_sub_sub_kategori_id', 'pelaku_usaha_id', 'satuan_id', 'brand_id','nama', 'deskripsi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function satuan()
    {
        return $this->belongsTo('App\Satuan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produkSubSubKategori()
    {
        return $this->belongsTo('App\ProdukSubSubKategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkJuals()
    {
        return $this->hasMany('App\ProdukJual');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkTanams()
    {
        return $this->hasMany('App\ProdukTanam', 'id_produk');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $keranjang_belanja_id
 * @property int $pelaku_usaha_id
 * @property int $jumlah
 * @property KeranjangBelanja $keranjangBelanja
 * @property PelakuUsaha $pelakuUsaha
 * @property KeranjangBelanjaPetaniProduk[] $keranjangBelanjaPetaniProduks
 */
class KeranjangBelanjaPelakuUsaha extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'keranjang_belanja_pelaku_usaha';

    /**
     * @var array
     */
    protected $fillable = ['keranjang_belanja_id', 'pelaku_usaha_id', 'jumlah'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function keranjangBelanja()
    {
        return $this->belongsTo('App\KeranjangBelanja');
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
    public function keranjangBelanjaPetaniProduks()
    {
        return $this->hasMany('App\KeranjangBelanjaPetaniProduk', 'keranjang_belanja_petani_id');
    }
}

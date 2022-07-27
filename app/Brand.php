<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pelaku_usaha_id
 * @property string $nama
 * @property PelakuUsaha $pelakuUsaha
 * @property Produk[] $produks
 */
class Brand extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'brand';

    /**
     * @var array
     */
    protected $fillable = [ 'pelaku_usaha_id' , 'nama'];

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
    public function produks()
    {
        return $this->hasMany('App\Produk');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $konsumen_id
 * @property string $tanggal
 * @property Konsuman $konsuman
 * @property KeranjangBelanjaPetani[] $keranjangBelanjaPetanis
 */
class Keranjang_Belanja extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'keranjang_belanja';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['konsumen_id', 'tanggal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function konsuman()
    {
        return $this->belongsTo('App\Konsuman', 'konsumen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keranjangBelanjaPetanis()
    {
        return $this->hasMany('App\KeranjangBelanjaPetani');
    }
}

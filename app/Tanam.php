<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lahan_id
 * @property string $nama
 * @property Lahan $lahan
 * @property ProdukTanam[] $produkTanams
 */
class Tanam extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tanam';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['lahan_id', 'nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lahan()
    {
        return $this->belongsTo('App\Lahan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produkTanams()
    {
        return $this->hasMany('App\ProdukTanam', 'id_tanam');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lokasi_propinsi_id
 * @property string $nama
 * @property string $status
 * @property LokasiPropinsi $lokasiPropinsi
 * @property LokasiKecamatan[] $lokasiKecamatans
 */
class LokasiKotakab extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lokasi_kotakab';

    /**
     * @var array
     */
    protected $fillable = ['lokasi_propinsi_id', 'nama', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiPropinsi()
    {
        return $this->belongsTo('App\LokasiPropinsi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lokasiKecamatans()
    {
        return $this->hasMany('App\LokasiKecamatan');
    }
}

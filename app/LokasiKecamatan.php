<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lokasi_kotakab_id
 * @property string $nama
 * @property float $lang
 * @property float $lat
 * @property string $area
 * @property string $kodepos
 * @property LokasiKotakab $lokasiKotakab
 * @property LokasiKelurahan[] $lokasiKelurahans
 */
class LokasiKecamatan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lokasi_kecamatan';

    /**
     * @var array
     */
    protected $fillable = ['lokasi_kotakab_id', 'nama', 'lang', 'lat', 'area', 'kodepos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKotakab()
    {
        return $this->belongsTo('App\LokasiKotakab');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lokasiKelurahans()
    {
        return $this->hasMany('App\LokasiKelurahan');
    }
}

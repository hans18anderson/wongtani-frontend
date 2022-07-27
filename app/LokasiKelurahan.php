<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lokasi_kecamatan_id
 * @property string $nama
 * @property string $lang
 * @property string $lat
 * @property string $area
 * @property LokasiKecamatan $lokasiKecamatan
 * @property Konsuman[] $konsumens
 * @property KonsumenAlamatKirim[] $konsumenAlamatKirims
 * @property Lahan[] $lahans
 * @property PelakuUsaha[] $pelakuUsahas
 * @property PelakuUsahaKoordinator[] $pelakuUsahaKoordinators
 */
class LokasiKelurahan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lokasi_kelurahan';

    /**
     * @var array
     */
    protected $fillable = ['lokasi_kecamatan_id', 'nama', 'lang', 'lat', 'area'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKecamatan()
    {
        return $this->belongsTo('App\LokasiKecamatan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function konsumens()
    {
        return $this->hasMany('App\Konsuman', 'kelurahan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function konsumenAlamatKirims()
    {
        return $this->hasMany('App\KonsumenAlamatKirim', 'kelurahan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lahans()
    {
        return $this->hasMany('App\Lahan', 'kelurahan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelakuUsahas()
    {
        return $this->hasMany('App\PelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelakuUsahaKoordinators()
    {
        return $this->hasMany('App\PelakuUsahaKoordinator');
    }
}

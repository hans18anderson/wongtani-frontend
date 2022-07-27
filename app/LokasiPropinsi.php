<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property LokasiKotakab[] $lokasiKotakabs
 */
class LokasiPropinsi extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lokasi_propinsi';

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lokasiKotakabs()
    {
        return $this->hasMany('App\LokasiKotakab');
    }
}

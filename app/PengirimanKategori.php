<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property Pengiriman[] $pengirimen
 */
class PengirimanKategori extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengiriman_kategori';

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengirimen()
    {
        return $this->hasMany('App\Pengiriman');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $kelurahan_id
 * @property int $konsumen_id
 * @property string $nama_penerima
 * @property string $hp_penerima
 * @property string $alamat
 * @property int $x
 * @property int $y
 * @property int $status
 * @property LokasiKelurahan $lokasiKelurahan
 * @property Konsuman $konsuman
 * @property PenjualanPelakuUsaha[] $penjualanPelakuUsahas
 */
class KonsumenAlamatKirim extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'konsumen_alamat_kirim';

    /**
     * @var array
     */
    protected $fillable = ['kelurahan_id', 'konsumen_id', 'nama_penerima', 'hp_penerima', 'alamat', 'x', 'y', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKelurahan()
    {
        return $this->belongsTo('App\LokasiKelurahan', 'kelurahan_id');
    }

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
    public function penjualanPelakuUsahas()
    {
        return $this->hasMany('App\PenjualanPelakuUsaha', 'alamat_kirim_id');
    }
}

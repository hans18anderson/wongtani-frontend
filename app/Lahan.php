<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pelaku_usaha_id
 * @property int $kelurahan_id
 * @property int $lahan_jenis_id
 * @property string $nama
 * @property string $alamat
 * @property string $x
 * @property string $y
 * @property LahanJeni $lahanJeni
 * @property LokasiKelurahan $lokasiKelurahan
 * @property PelakuUsaha $pelakuUsaha
 */
class Lahan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lahan';

    /**
     * @var array
     */
    protected $fillable = ['pelaku_usaha_id', 'kelurahan_id', 'lahan_jenis_id', 'nama', 'alamat', 'x', 'y'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lahanJeni()
    {
        return $this->belongsTo('App\LahanJeni', 'lahan_jenis_id');
    }

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
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }
}

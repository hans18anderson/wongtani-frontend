<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $judul
 * @property string $deskripsi
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $kode_promosi
 * @property string $path_foto_promosi
 * @property string $status
 * @property PenjualanPelakuUsaha[] $penjualanPelakuUsahas
 */
class Promosi extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'promosi';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'kode_promosi', 'path_foto_promosi', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahas()
    {
        return $this->hasMany('App\PenjualanPelakuUsaha');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lokasi_kelurahan_id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $nomor_KTP
 * @property string $email
 * @property string $nomor_telp
 * @property string $deskripsi
 * @property string $catatan
 * @property string $nama_cp
 * @property string $nomor_telp_cp
 * @property string $foto_KTP
 * @property string $foto_profil
 * @property string $x
 * @property string $y
 * @property string $status
 * @property LokasiKelurahan $lokasiKelurahan
 * @property PelakuUsaha[] $pelakuUsahas
 */
class PelakuUsahaKoordinator extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pelaku_usaha_koordinator';

    /**
     * @var array
     */
    protected $fillable = ['lokasi_kelurahan_id', 'username', 'password', 'nama', 'alamat', 'nomor_KTP', 'email', 'nomor_telp', 'deskripsi', 'catatan', 'nama_cp', 'nomor_telp_cp', 'foto_KTP', 'foto_profil', 'x', 'y', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKelurahan()
    {
        return $this->belongsTo('App\LokasiKelurahan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelakuUsahas()
    {
        return $this->hasMany('App\PelakuUsaha');
    }
}

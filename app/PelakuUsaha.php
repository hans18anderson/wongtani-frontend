<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lokasi_kelurahan_id
 * @property int $pelaku_usaha_koordinator_id
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
 * @property PelakuUsahaKoordinator $pelakuUsahaKoordinator
 * @property Brand[] $brands
 * @property KeranjangBelanjaPelakuUsaha[] $keranjangBelanjaPelakuUsahas
 * @property Kurir[] $kurirs
 * @property Lahan[] $lahans
 * @property PelakuUsahaBidang[] $pelakuUsahaBidangs
 * @property PenjualanPelakuUsaha[] $penjualanPelakuUsahas
 */
class PelakuUsaha extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pelaku_usaha';

    /**
     * @var array
     */
    protected $fillable = ['lokasi_kelurahan_id', 'pelaku_usaha_koordinator_id', 'username', 'password', 'nama', 'alamat', 'nomor_KTP', 'email', 'nomor_telp', 'deskripsi', 'catatan', 'nama_cp', 'nomor_telp_cp', 'foto_KTP', 'foto_profil', 'x', 'y', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKelurahan()
    {
        return $this->belongsTo('App\LokasiKelurahan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsahaKoordinator()
    {
        return $this->belongsTo('App\PelakuUsahaKoordinator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keranjangBelanjaPelakuUsahas()
    {
        return $this->hasMany('App\KeranjangBelanjaPelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kurirs()
    {
        return $this->hasMany('App\Kurir');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lahans()
    {
        return $this->hasMany('App\Lahan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelakuUsahaBidangs()
    {
        return $this->hasMany('App\PelakuUsahaBidang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanPelakuUsahas()
    {
        return $this->hasMany('App\PenjualanPelakuUsaha');
    }
}

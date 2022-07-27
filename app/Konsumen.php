<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $kelurahan_id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $nomor_KTP
 * @property string $email
 * @property string $nomor_telp
 * @property string $foto_profil
 * @property string $status
 * @property LokasiKelurahan $lokasiKelurahan
 * @property KeranjangBelanja[] $keranjangBelanjas
 * @property KonsumenAlamatKirim[] $konsumenAlamatKirims
 * @property Penjualan[] $penjualans
 */
class Konsumen extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'konsumen';

    /**
     * @var array
     */
    protected $fillable = ['kelurahan_id', 'username', 'password', 'nama', 'alamat', 'nomor_KTP', 'email', 'nomor_telp', 'foto_profil', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasiKelurahan()
    {
        return $this->belongsTo('App\LokasiKelurahan', 'kelurahan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keranjangBelanjas()
    {
        return $this->hasMany('App\KeranjangBelanja', 'konsumen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function konsumenAlamatKirims()
    {
        return $this->hasMany('App\KonsumenAlamatKirim', 'konsumen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualans()
    {
        return $this->hasMany('App\Penjualan', 'konsumen_id');
    }
}

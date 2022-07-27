<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property TempatUsaha[] $tempatUsahas
 */
class TempatUsahaJenis extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tempatUsahas()
    {
        return $this->hasMany('App\TempatUsaha', 'tempat_usaha_jenis_id');
    }
}

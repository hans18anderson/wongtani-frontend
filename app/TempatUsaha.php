<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tempat_usaha_jenis_id
 * @property string $nama
 * @property string $alamat
 * @property string $x
 * @property string $y
 * @property int $pelaku_usaha_id
 * @property int $kelurahan_id
 * @property TempatUsahaJeni $tempatUsahaJeni
 */
class TempatUsaha extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tempat_usaha';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['tempat_usaha_jenis_id', 'nama', 'alamat', 'x', 'y', 'pelaku_usaha_id', 'kelurahan_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tempatUsahaJeni()
    {
        return $this->belongsTo('App\TempatUsahaJeni', 'tempat_usaha_jenis_id');
    }
}

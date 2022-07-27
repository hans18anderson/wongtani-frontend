<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pelaku_usaha_id
 * @property string $nama
 * @property int $status
 * @property PelakuUsaha $pelakuUsaha
 * @property Pengiriman[] $pengirimen
 */
class Kurir extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kurir';

    /**
     * @var array
     */
    protected $fillable = ['pelaku_usaha_id', 'nama', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengirimen()
    {
        return $this->hasMany('App\Pengiriman');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property PelakuUsahaBidang[] $pelakuUsahaBidangs
 */
class BidangUsaha extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bidang_usaha';

    /**
     * @var array
     */
    protected $fillable = ['nama'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelakuUsahaBidangs()
    {
        return $this->hasMany('App\PelakuUsahaBidang');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bidang_usaha_id
 * @property int $pelaku_usaha_id
 * @property BidangUsaha $bidangUsaha
 * @property PelakuUsaha $pelakuUsaha
 */
class PelakuUsahaBidang extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pelaku_usaha_bidang';

    /**
     * @var array
     */
    protected $fillable = ['bidang_usaha_id', 'pelaku_usaha_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidangUsaha()
    {
        return $this->belongsTo('App\BidangUsaha');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelakuUsaha()
    {
        return $this->belongsTo('App\PelakuUsaha');
    }
}

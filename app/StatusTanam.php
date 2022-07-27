<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property ProdukTanamPerkembangan[] $produkTanamPerkembangans
 */
class StatusTanam extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'status_tanam';

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
    public function produkTanamPerkembangans()
    {
        return $this->hasMany('App\ProdukTanamPerkembangan');
    }
}

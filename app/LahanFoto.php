<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lahan_id
 * @property string $url_file
 * @property string $label
 * @property string $status
 * @property Lahan $lahan
 */
class LahanFoto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lahan_foto';

    /**
     * @var array
     */
    protected $fillable = ['lahan_id', 'url_file', 'label', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lahan()
    {
        return $this->belongsTo('App\Lahan');
    }
}

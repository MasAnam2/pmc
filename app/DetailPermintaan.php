<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $table = 'detail_permintaan';
    protected $appends = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'kd_material', 'no_pm', 'qty', 'ket',
    ];

    public $timestamps = false;

    public function material()
    {
        return $this->belongsTo('App\Material', 'kd_material', 'kd_material');
    }
}

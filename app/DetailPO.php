<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPO extends Model
{
    protected $table = 'detail_po';
    protected $appends = ['total'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_po', 'kd_material', 'qty'
    ];

    public $timestamps = false;

    public function material()
    {
        return $this->belongsTo('App\Material', 'kd_material', 'kd_material');
    }

    public function getTotalAttribute()
    {
        $m = $this->material;
        return $m->hrg_stn * $this->qty;
    }

}

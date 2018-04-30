<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
	protected $table = 'permintaan_material';
	protected $appends = ['total'];
	protected $primaryKey = 'no_pm';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_pm', 'tgl_pm', 'almt_pm', 'id_user', 'kd_supplier'
    ];

    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    public function detail()
    {
    	return $this->hasMany('App\DetailPermintaan', 'no_pm', 'no_pm');
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier', 'kd_supplier', 'kd_supplier');
    }

    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach($this->detail as $d){
    		$total += $d->qty;
    	}
    	return $total;
    }

}

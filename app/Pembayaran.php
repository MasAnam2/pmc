<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'no_pb';
	protected $appends = ['total_semua'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_pb', 'tgl_pb', 'nm_peru', 'bank', 'almt_bank', 'no_rek'
    ];

    public $timestamps = false;

    public function detail()
    {
    	return $this->hasMany('App\DetailPembayaran', 'no_pb', 'no_pb');
    }

    public function getTotalSemuaAttribute()
    {
    	return $this->detail->sum(function($item){
    		return $item['total_bayar'];
    	});
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    protected $table = 'detail_pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_po', 'tagihan', 'no_invoice', 'no_fp', 'tagihan', 'ppn', 'total_bayar',
    ];

    public $timestamps = false;

    public function pembayaran()
    {
    	return $this->belongsTo('App\Pembayaran', 'no_pb', 'no_pb');
    }
}

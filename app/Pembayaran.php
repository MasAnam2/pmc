<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'no_pb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_pb', 'tgl_pb', 'nm_peru', 'bank', 'almt_bank', 'no_rek'
    ];

    public $timestamps = false;
}

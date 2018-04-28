<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaanMaterial extends Model
{
    protected $table = 'penerimaan';
    protected $primaryKey = 'no_pen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'no_sj', 'tgl_pen', 'jmlh_order', 'jmlh_diterima', 'no_po'
    ];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';
    protected $primaryKey = 'no_jurnal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'tgl_jurnal', 'debet', 'kredit', 'saldo', 'no_pb', 'no_perkiraan'
    ];

    public $timestamps = false;//
}

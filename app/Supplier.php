<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'kd_supplier';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kd_supplier', 'nm_supplier', 'almat', 'no_telp', 'fax', 'email'
    ];

    public $timestamps = false;
}

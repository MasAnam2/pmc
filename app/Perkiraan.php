<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
    protected $table = 'perkiraan';
    protected $primaryKey = 'no_perk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nm_perk',
    ];

    public $timestamps = false;
}

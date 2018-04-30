<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $primaryKey = 'key';

    protected $table = 'pengaturan';

    public $timestamps = false;

    protected $fillable = ['key', 'value'];

    protected $casts = ['value'=>'array'];
}

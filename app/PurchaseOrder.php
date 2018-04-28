<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
	protected $table = 'po';
	protected $primaryKey = 'no_po';
    protected $appends = ['total'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'no_po', 'tgl_po', 'kd_supplier',     
    ];

    public $timestamps = false;

    public function detail()
    {
        return $this->hasMany('App\DetailPO', 'no_po', 'no_po');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'kd_supplier', 'kd_supplier');
    }

    public function getTotalAttribute()
    {
        $total_keseluruhan = 0;
        foreach ($this->detail as $d) {
            $total_keseluruhan += $d->total;
        }
        return $total_keseluruhan;
    }

    public function scopeData($q)
    {
        return $q->with('detail.material', 'detail')->get();
    }
}

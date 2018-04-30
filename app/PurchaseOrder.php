<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
	protected $table = 'po';
	protected $primaryKey = 'no_po';
    protected $appends = ['total', 'total_qty'];

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

    public function getTotalQtyAttribute()
    {
        $t = 0;
        foreach ($this->detail as $d) {
            $t += $d->qty;
        }
        return $t;
    }

    public function scopeData($q, $r)
    {
        if($r->query('tgl_mulai') && $r->query('tgl_sampai')){
            return $q->with('detail.material')
            ->whereBetween('tgl_po', [$r->query('tgl_mulai'), $r->query('tgl_sampai')])
            ->orderBy('tgl_po')
            ->get();
        }
        return [];
    }
}

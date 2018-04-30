<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Material;
use App\PurchaseOrder;
use App\Pembayaran;
use App\Jurnal;
use App\Perkiraan;
use App\User;
use App\PenerimaanMaterial;
use App\Permintaan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $po_setahun = [];
        foreach (range(1, 12) as $bulan) {
            $po = PurchaseOrder::with('detail')->whereYear('tgl_po', date('Y'))->whereMonth('tgl_po', $bulan)->first();
            if(count($po) > 0){
                $po_setahun[] = [
                    'total_qty'     => $po->total_qty,
                    'total_tagihan' => $po->total,
                ];
            }else{
                $po_setahun[] = [
                    'total_qty'     => 0,
                    'total_tagihan' => 0,
                ];
            }
        }
        $data = [
            'jml_supplier'        => Supplier::count(),
            'jml_material'        => Material::count(),
            'jml_po'              => PurchaseOrder::count(),
            'jml_pembayaran'      => Pembayaran::count(),
            'jml_jurnal'          => Jurnal::count(),
            'jml_perkiraan'       => Perkiraan::count(),
            'jml_penerimaan'      => PenerimaanMaterial::count(),
            'jml_permintaan'      => Permintaan::count(),
            'jml_user'            => User::count(),
            'po_setahun'          => $po_setahun,
        ];
        return view('home', $data);
    }
}

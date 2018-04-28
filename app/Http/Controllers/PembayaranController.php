<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\PurchaseOrder;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran.index', [
            'data'      => Pembayaran::all(),
            'po'        => PurchaseOrder::all(),
        ]);
    }

    public function tambah(Request $r)
    {
        $r->validate([
            'no_sj'             => 'required', 
            'tgl_pen'           => 'required', 
            'jmlh_order'        => 'required|numeric', 
            'jmlh_diterima'     => 'required|numeric', 
            'no_po'             => 'required',
        ]);
        Pembayaran::create([
            'no_sj'             => $r->no_sj,
            'tgl_pen'           => $r->tgl_pen,
            'jmlh_order'        => $r->jmlh_order,
            'jmlh_diterima'     => $r->jmlh_diterima,
            'no_po'             => $r->no_po,
        ]);
        return redirect()->route('pembayaran')->with('success', 'Penerimaan material baru berhasil dibuat');
    }

    public function ubah($id)
    {
        $d = Pembayaran::find($id);
        return view('pembayaran.ubah', [
            'd' => $d,
        ]);
    }

    public function perbarui($id, Request $r)
    {
        $r->validate([
            'no_sj'             => 'required', 
            'tgl_pen'           => 'required', 
            'jmlh_order'        => 'required|numeric', 
            'jmlh_diterima'     => 'required|numeric', 
            'no_po'             => 'required',
        ]);
        Pembayaran::find($id)->update([
            'no_sj'             => $r->no_sj,
            'tgl_pen'           => $r->tgl_pen,
            'jmlh_order'        => $r->jmlh_order,
            'jmlh_diterima'     => $r->jmlh_diterima,
            'no_po'             => $r->no_po,
        ]);
        return redirect()->route('pembayaran')->with('success', 'Penerimaan material berhasil diperbarui');
    }

    public function hapus($id)
    {
        Pembayaran::find($id)->delete();
        return redirect()->route('pembayaran')->with('success', 'Penerimaan material berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\PenerimaanMaterial;
use App\PurchaseOrder;
use Illuminate\Http\Request;

class PenerimaanMaterialController extends Controller
{
    public function index()
    {
        return view('p_material.index', [
            'data'      => PenerimaanMaterial::all(),
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
        PenerimaanMaterial::create([
            'no_sj'             => $r->no_sj,
            'tgl_pen'           => $r->tgl_pen,
            'jmlh_order'        => $r->jmlh_order,
            'jmlh_diterima'     => $r->jmlh_diterima,
            'no_po'             => $r->no_po,
        ]);
        return redirect()->route('p_material')->with('success', 'Penerimaan material baru berhasil dibuat');
    }

    public function ubah($id)
    {
        $d = PenerimaanMaterial::find($id);
        return view('p_material.ubah', [
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
        PenerimaanMaterial::find($id)->update([
            'no_sj'             => $r->no_sj,
            'tgl_pen'           => $r->tgl_pen,
            'jmlh_order'        => $r->jmlh_order,
            'jmlh_diterima'     => $r->jmlh_diterima,
            'no_po'             => $r->no_po,
        ]);
        return redirect()->route('p_material')->with('success', 'Penerimaan material berhasil diperbarui');
    }

    public function hapus($id)
    {
        PenerimaanMaterial::find($id)->delete();
        return redirect()->route('p_material')->with('success', 'Penerimaan material berhasil dihapus');
    }
}

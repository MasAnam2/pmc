<?php

namespace App\Http\Controllers;

use App\PurchaseOrder;
use App\Supplier;
use App\Material;
use App\DetailPO;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        return view('po.index', [
            'data'      => PurchaseOrder::data(),
            'supplier'  => Supplier::all(),
            'material'  => Material::all(),
        ]);
    }

    public function tambah(Request $r)
    {
        $r->validate([
            'supplier'      => 'required',
            'material'      => 'required|array|min:1',
            'material.*'    => 'required',
            'qty'           => 'required|array|min:1',
            'qty.*'         => 'required|numeric|min:1',
        ]);
        $po = PurchaseOrder::create([
            'tgl_po'        => $r->tgl_po,
            'kd_supplier'   => $r->supplier,
        ]);
        foreach (range(0, count($r->material)-1) as $i) {
            $po->detail()->create([
                'kd_material'   => $r->material[$i],
                'qty'           => $r->qty[$i],
            ]);
        }
        return redirect()->route('po')->with('success', 'Purchase Order baru berhasil dibuat');
    }

    public function ubah($id)
    {
        $d = PurchaseOrder::with('detail')->where('no_po', $id)->first();
        return view('po.ubah', [
            'd'         => $d,
            'supplier'  => Supplier::all(),
            'material'  => Material::all(),
        ]);
    }

    public function perbarui($id, Request $r)
    {
        $r->validate([
            'supplier'      => 'required',
            'material'      => 'required|array|min:1',
            'material.*'    => 'required',
            'qty'           => 'required|array|min:1',
            'qty.*'         => 'required|numeric|min:1',
        ]);
        $po = PurchaseOrder::find($id)->update([
            'tgl_po'        => $r->tgl_po,
            'kd_supplier'   => $r->supplier,
        ]);
        $po = PurchaseOrder::find($id);
        $po->detail()->delete();
        foreach (range(0, count($r->material)-1) as $i) {
            $po->detail()->create([
                'kd_material'   => $r->material[$i],
                'qty'           => $r->qty[$i],
            ]);
        }
        return redirect()->route('po')->with('success', 'Purchase Order berhasil diperbarui');
    }

    public function hapus($id)
    {
        $po = PurchaseOrder::find($id);
        $po->detail()->delete();
        $po->delete();
        return redirect()->route('po')->with('success', 'Purchase Order berhasil dihapus');
    }

    public function cetak($id)
    {
        $d = PurchaseOrder::with('detail')->where('no_po', $id)->first();
        return view('po.print', [
            'd' => $d,
        ]);
    }

    public function totalOrder($id)
    {
        $po = PurchaseOrder::where('no_po', $id)->with('detail')->first();
        $total = 0;
        foreach ($po->detail as $d) {
            $total += $d->qty;
        }
        return $total;
    }
}

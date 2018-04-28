<?php

namespace App\Http\Controllers;

use App\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        return view('jurnal.index', [
            'data'      => Jurnal::all(),
        ]);
    }

    public function tambah(Request $r)
    {
        $r->validate([
            'nm_jurnal'   => 'required',
            'hrg_stn'       => 'required|numeric'
        ]);
        Jurnal::create([
            'nm_jurnal'   => $r->nm_jurnal,
            'hrg_stn'       => $r->hrg_stn,
        ]);
        return redirect()->route('jurnal')->with('success', 'Jurnal baru berhasil dibuat');
    }

    public function ubah($id)
    {
        $d = Jurnal::find($id);
        return view('jurnal.ubah', [
            'd' => $d,
        ]);
    }

    public function perbarui($id, Request $r)
    {
        $r->validate([
            'nm_jurnal'   => 'required',
            'hrg_stn'       => 'required'
        ]);
        Jurnal::find($id)->update([
            'nm_jurnal'   => $r->nm_jurnal,
            'hrg_stn'       => $r->hrg_stn,
        ]);
        return redirect()->route('jurnal')->with('success', 'Jurnal berhasil diperbarui');
    }

    public function hapus($id)
    {
        Jurnal::find($id)->delete();
        return redirect()->route('jurnal')->with('success', 'Jurnal berhasil dihapus');
    }
}

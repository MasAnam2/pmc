<?php

namespace App\Http\Controllers;

use App\Jurnal;
use App\Perkiraan;
use App\Pembayaran;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        return view('jurnal.index', [
            'data'          => Jurnal::all(),
            'perkiraan'     => Perkiraan::all(),
            'pembayaran'    => Pembayaran::all(),
        ]);
    }

    public function tambah(Request $r)
    {
        $r->validate([
            'tgl_jurnal'        => 'required|date_format:Y-m-d',
            'debet'             => 'required|numeric',
            'kredit'            => 'required|numeric',
            'saldo'             => 'required|numeric',
            'no_pb'             => 'required',
            'no_perkiraan'      => 'required',
        ]);
        Jurnal::create([
            'tgl_jurnal'        => $r->tgl_jurnal,
            'debet'             => $r->debet,
            'kredit'            => $r->kredit,
            'saldo'             => $r->saldo,
            'no_pb'             => $r->no_pb,
            'no_perkiraan'      => $r->no_perkiraan,
        ]);
        return redirect()->route('jurnal')->with('success', 'Jurnal baru berhasil dibuat');
    }

    public function ubah(Jurnal $jurnal)
    {
        return view('jurnal.ubah', [
            'd'             => $jurnal,
            'perkiraan'     => Perkiraan::all(),
            'pembayaran'    => Pembayaran::all(),
        ]);
    }

    public function perbarui(Jurnal $jurnal, Request $r)
    {
        $r->validate([
            'tgl_jurnal'        => 'required|date_format:Y-m-d',
            'debet'             => 'required|numeric',
            'kredit'            => 'required|numeric',
            'saldo'             => 'required|numeric',
            'no_pb'             => 'required',
            'no_perkiraan'      => 'required',
        ]);
        $jurnal->update([
            'tgl_jurnal'        => $r->tgl_jurnal,
            'debet'             => $r->debet,
            'kredit'            => $r->kredit,
            'saldo'             => $r->saldo,
            'no_pb'             => $r->no_pb,
            'no_perkiraan'      => $r->no_perkiraan,
        ]);
        return redirect()->route('jurnal')->with('success', 'Jurnal berhasil diperbarui');
    }

    public function hapus(Jurnal $jurnal)
    {
        $jurnal->delete();
        return redirect()->route('jurnal')->with('success', 'Jurnal berhasil dihapus');
    }
}

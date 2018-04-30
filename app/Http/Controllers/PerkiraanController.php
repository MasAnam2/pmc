<?php

namespace App\Http\Controllers;

use App\Perkiraan;
use Illuminate\Http\Request;

class PerkiraanController extends Controller
{
    public function index()
    {
        return view('perkiraan.index', [
            'data'      => Perkiraan::all(),
        ]);
    }

    public function tambah(Request $r)
    {
        $r->validate([
            'nm_perk'   => 'required',
        ]);
        Perkiraan::create([
            'nm_perk'   => $r->nm_perk,
        ]);
        return redirect()->route('perkiraan')->with('success', 'Perkiraan baru berhasil dibuat');
    }

    public function ubah(Perkiraan $perkiraan)
    {
        return view('perkiraan.ubah', [
            'd' => $perkiraan,
        ]);
    }

    public function perbarui(Perkiraan $perkiraan, Request $r)
    {
        $r->validate([
            'nm_perk'   => 'required',
        ]);
        $perkiraan->update([
            'nm_perk'   => $r->nm_perk,
        ]);
        return redirect()->route('perkiraan')->with('success', 'Perkiraan berhasil diperbarui');
    }

    public function hapus(Perkiraan $perkiraan)
    {
        $perkiraan->delete();
        return redirect()->route('perkiraan')->with('success', 'Perkiraan berhasil dihapus');
    }
}

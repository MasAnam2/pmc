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

    public function ubah($id)
    {
        $d = Perkiraan::find($id);
        return view('perkiraan.ubah', [
            'd' => $d,
        ]);
    }

    public function perbarui($id, Request $r)
    {
        $r->validate([
            'nm_perk'   => 'required',
        ]);
        Perkiraan::find($id)->update([
            'nm_perk'   => $r->nm_perk,
        ]);
        return redirect()->route('perkiraan')->with('success', 'Perkiraan berhasil diperbarui');
    }

    public function hapus($id)
    {
        Perkiraan::find($id)->delete();
        return redirect()->route('perkiraan')->with('success', 'Perkiraan berhasil dihapus');
    }
}

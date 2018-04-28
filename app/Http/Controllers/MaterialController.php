<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
	{
		return view('material.index', [
			'data'		=> Material::all(),
		]);
	}

	public function tambah(Request $r)
	{
		$r->validate([
			'nm_material'	=> 'required',
			'hrg_stn'		=> 'required|numeric'
		]);
		Material::create([
			'nm_material'   => $r->nm_material,
			'hrg_stn'       => $r->hrg_stn,
		]);
		return redirect()->route('material')->with('success', 'Material baru berhasil dibuat');
	}

	public function ubah($id)
	{
		$d = Material::find($id);
		return view('material.ubah', [
			'd'	=> $d,
		]);
	}

	public function perbarui($id, Request $r)
	{
		$r->validate([
			'nm_material'	=> 'required',
			'hrg_stn'		=> 'required'
		]);
		Material::find($id)->update([
			'nm_material'   => $r->nm_material,
			'hrg_stn'       => $r->hrg_stn,
		]);
		return redirect()->route('material')->with('success', 'Material berhasil diperbarui');
	}

	public function hapus($id)
	{
		Material::find($id)->delete();
		return redirect()->route('material')->with('success', 'Material berhasil dihapus');
	}
}

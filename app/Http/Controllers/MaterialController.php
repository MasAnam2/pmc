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

	public function ubah(Material $material)
	{
		return view('material.ubah', [
			'd'	=> $material,
		]);
	}

	public function perbarui(Material $material, Request $r)
	{
		$r->validate([
			'nm_material'	=> 'required',
			'hrg_stn'		=> 'required'
		]);
		$material->update([
			'nm_material'   => $r->nm_material,
			'hrg_stn'       => $r->hrg_stn,
		]);
		return redirect()->route('material')->with('success', 'Material berhasil diperbarui');
	}

	public function hapus(Material $material)
	{
		$material->delete();
		return redirect()->route('material')->with('success', 'Material berhasil dihapus');
	}
}

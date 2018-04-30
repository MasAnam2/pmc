<?php

namespace App\Http\Controllers;

use App\Permintaan;
use App\Material;
use App\Supplier;
use Illuminate\Http\Request;

class PermintaanMaterialController extends Controller
{
    public function index()
	{
		return view('permintaan.index', [
			'data'		=> Permintaan::with('supplier', 'detail')->get(),
			'supplier'	=> Supplier::all(),
			'material'	=> Material::all(),
		]);
	}

	public function tambah(Request $r)
	{
		$r->validate([
			'kd_supplier'	=> 'required',
			'almt_pm'		=> 'required',
			'kd_material'	=> 'required|array',
			'qty'			=> 'required|array',
			'qty.*'			=> 'required|numeric|min:1'
		]);
		$p = Permintaan::create([
			'id_user'   		=> $r->user()->id_user,
			'kd_supplier'       => $r->kd_supplier,
			'almt_pm'         	=> $r->almt_pm,
			'tgl_pm'           	=> $r->tgl_pm,
		]);
		$i = 0;
		foreach ($r->qty as $q) {
			$p->detail()->create([
				'kd_material'	=> $r->kd_material[$i],
				'qty'			=> $q,
				'ket'			=> $r->ket[$i]
			]);
			$i++;
		}
		return redirect()->route('permintaan')->with('success', 'Permintaan material baru berhasil dibuat');
	}

	public function ubah($id)
	{
		if(!Permintaan::where('no_pm', $id)->exists()){
			abort(404);
		}
		$d = Permintaan::with('detail')->where('no_pm', $id)->first();
		return view('permintaan.ubah', [
			'd'	=> $d,
			'supplier'	=> Supplier::all(),
			'material'	=> Material::all(),
		]);
	}

	public function perbarui($id, Request $r)
	{
		$r->validate([
			'kd_supplier'	=> 'required',
			'almt_pm'		=> 'required',
			'kd_material'	=> 'required|array',
			'qty'			=> 'required|array',
			'qty.*'			=> 'required|numeric|min:1'
		]);
		Permintaan::find($id)->update([
			'id_user'   		=> $r->user()->id_user,
			'kd_supplier'       => $r->kd_supplier,
			'almt_pm'         	=> $r->almt_pm,
			'tgl_pm'           	=> $r->tgl_pm,
		]);
		$i = 0;
		$p = Permintaan::find($id);
		$p->detail()->delete();
		foreach ($r->qty as $q) {
			$p->detail()->create([
				'kd_material'	=> $r->kd_material[$i],
				'qty'			=> $q,
				'ket'			=> $r->ket[$i]
			]);
			$i++;
		}
		return redirect()->route('permintaan')->with('success', 'Permintaan material berhasil diperbarui');
	}

	public function hapus($id)
	{
		$p = Permintaan::find($id);
		$p->detail()->delete();
		$p->delete();
		return redirect()->route('permintaan')->with('success', 'Permintaan material berhasil dihapus');
	}

	public function cetak(Permintaan $permintaan)
	{
		$d = Permintaan::with('detail.material', 'supplier')->where('no_pm', $permintaan->no_pm)->first();
		return view('permintaan.print', [
			'd'	=> $d,
		]);
	}
}

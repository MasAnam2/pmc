<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
	public function index()
	{
		return view('supplier.index', [
			'data'	=> Supplier::all(),
		]);
	}

	public function tambah(Request $r)
	{
		$r->validate([
			'nm_supplier'	=> 'required',
			'no_telp'		=> 'required',
			'email'			=> 'required|email',
			'fax'			=> 'required',
			'almat'			=> 'required',
		]);
		Supplier::create([
			'nm_supplier'   => $r->nm_supplier,
			'no_telp'       => $r->no_telp,
			'email'         => $r->email,
			'fax'           => $r->fax,
			'almat'         => $r->almat,
		]);
		return redirect()->route('supplier')->with('success', 'Supplier baru berhasil dibuat');
	}

	public function ubah($id)
	{
		$d = Supplier::find($id);
		return view('supplier.ubah', [
			'd'	=> $d,
		]);
	}

	public function perbarui($id, Request $r)
	{
		$r->validate([
			'nm_supplier'	=> 'required',
			'no_telp'		=> 'required',
			'email'			=> 'required|email',
			'fax'			=> 'required',
			'almat'			=> 'required',
		]);
		Supplier::find($id)->update([
			'nm_supplier'   => $r->nm_supplier,
			'no_telp'       => $r->no_telp,
			'email'         => $r->email,
			'fax'           => $r->fax,
			'almat'         => $r->almat,
		]);
		return redirect()->route('supplier')->with('success', 'Supplier berhasil diperbarui');
	}

	public function hapus($id)
	{
		Supplier::find($id)->delete();
		return redirect()->route('supplier')->with('success', 'Supplier berhasil dihapus');
	}
}

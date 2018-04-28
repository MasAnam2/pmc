<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		return view('user.index', [
			'data'	=> User::all(),
		]);
	}

	public function tambah(Request $r)
	{
		$r->validate([
			'username'	=> 'required|unique:user|min:5|max:20',
			'password'	=> 'required|min:5|max:20',
			'hak_akses'	=> 'required',
		]);
		User::create([
			'username'	=> $r->username,
			'password'	=> bcrypt($r->password),
			'hak_akses'	=> $r->hak_akses,
		]);
		return redirect()->route('user')->with('success', 'User baru berhasil dibuat');
	}

	public function ubah($id)
	{
		$d = User::find($id);
		return view('user.ubah', [
			'd'	=> $d,
		]);
	}

	public function perbarui($id, Request $r)
	{
		$r->validate([
			'username'	=> 'required|'. ($r->username != $r->username_lama ? 'unique:user|' : '').'min:5|max:20',
			'password'	=> 'required|min:5|max:20',
			'hak_akses'	=> 'required',
		]);
		User::find($id)->update([
			'username'	=> $r->username,
			'password'	=> bcrypt($r->password),
			'hak_akses'	=> $r->hak_akses,
		]);
		return redirect()->route('user')->with('success', 'User berhasil diperbarui');
	}

	public function hapus($id)
	{
		User::find($id)->delete();
		return redirect()->route('user')->with('success', 'User berhasil dihapus');
	}
}

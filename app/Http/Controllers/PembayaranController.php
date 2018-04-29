<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\PurchaseOrder;

class PembayaranController extends Controller
{
	public function index()
	{
		return view('pembayaran.index', [
			'data'      => Pembayaran::all(),
			'po'        => PurchaseOrder::all(),
		]);
	}

	public function tambah(Request $r)
	{
		$r->validate([
			'no_po'             => 'required|array', 
			'tagihan'           => 'required|array', 
			'no_invoice'		=> 'required|array',
			'no_fp'				=> 'required|array',
			'tagihan'			=> 'required|array',
			'ppn'				=> 'required|array',
			'total_bayar'		=> 'required|array',
			'tgl_pb'			=> 'required|date_format:Y-m-d',
			'nm_peru'			=> 'required',
			'bank'				=> 'required',
			'almt_bank'			=> 'required',
			'no_rek'			=> 'required',
		]);
		$pembayaran = Pembayaran::create([
			'tgl_pb'		=> $r->tgl_pb,
			'nm_peru'		=> $r->nm_peru,
			'bank'			=> $r->bank,
			'almt_bank'		=> $r->almt_bank,
			'no_rek'		=> $r->no_rek,
		]);
		$i = 0;
		foreach($r->no_po as $po){
			$pembayaran->detail()->create([
				'no_po'				=> $po,
				'tagihan'			=> $r->tagihan[$i],
				'no_invoice'		=> $r->no_invoice[$i],
				'no_fp'				=> $r->no_fp[$i],
				'tagihan'			=> $r->tagihan[$i],
				'ppn'				=> $r->ppn[$i],
				'total_bayar'		=> $r->total_bayar[$i],
			]);
			$i++;
		}
		return redirect()->route('pembayaran')->with('success', 'Pembayaran baru berhasil dibuat');
	}

	public function ubah($id)
	{
		$d = Pembayaran::with('detail')->where('no_pb', $id)->first();
		return view('pembayaran.ubah', [
			'd' => $d,
			'po'        => PurchaseOrder::all(),
		]);
	}

	public function perbarui($id, Request $r)
	{
		$r->validate([
			'no_po'             => 'required|array', 
			'tagihan'           => 'required|array', 
			'no_invoice'		=> 'required|array',
			'no_fp'				=> 'required|array',
			'tagihan'			=> 'required|array',
			'ppn'				=> 'required|array',
			'total_bayar'		=> 'required|array',
			'tgl_pb'			=> 'required|date_format:Y-m-d',
			'nm_peru'			=> 'required',
			'bank'				=> 'required',
			'almt_bank'			=> 'required',
			'no_rek'			=> 'required',
		]);
		$p = Pembayaran::find($id);
		$p->update([
			'tgl_pb'		=> $r->tgl_pb,
			'nm_peru'		=> $r->nm_peru,
			'bank'			=> $r->bank,
			'almt_bank'		=> $r->almt_bank,
			'no_rek'		=> $r->no_rek,
		]);
		$i = 0;
		$p->detail()->delete();
		foreach($r->no_po as $po){
			$p->detail()->create([
				'no_po'				=> $po,
				'tagihan'			=> $r->tagihan[$i],
				'no_invoice'		=> $r->no_invoice[$i],
				'no_fp'				=> $r->no_fp[$i],
				'tagihan'			=> $r->tagihan[$i],
				'ppn'				=> $r->ppn[$i],
				'total_bayar'		=> $r->total_bayar[$i],
			]);
			$i++;
		}
		return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil diperbarui');
	}

	public function hapus($id)
	{
		$p = Pembayaran::find($id);
		$p->detail()->delete();
		$p->delete();
		return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil dihapus');
	}

	public function cetak($id)
	{
		$d = Pembayaran::with('detail')->where('no_pb', $id)->first();
		return view('pembayaran.print', [
			'd'		=> $d
		]);
	}
}

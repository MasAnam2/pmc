<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\PurchaseOrder;

class PembayaranController extends Controller
{
	public function index(Request $r)
	{
		$data = [];
		if($r->query('tgl_mulai') && $r->query('tgl_sampai')){
			$data = Pembayaran::whereBetween('tgl_pb', [$r->query('tgl_mulai'), $r->query('tgl_sampai')])
			->orderBy('tgl_pb')
			->get();
		}
		return view('pembayaran.index', [
			'data'      => $data,
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
		if(!Pembayaran::where('no_pb', $id)->exists()){
			abort(404);
		}
		$d = Pembayaran::with('detail')->where('no_pb', $id)->first();
		return view('pembayaran.ubah', [
			'd' => $d,
			'po'        => PurchaseOrder::all(),
		]);
	}

	public function perbarui($id, Request $r)
	{
		if(!Pembayaran::where('no_pb', $id)->exists()){
			abort(404);
		}
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
		if(!Pembayaran::where('no_pb', $id)->exists()){
			abort(404);
		}
		$p = Pembayaran::find($id);
		$p->detail()->delete();
		$p->delete();
		return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil dihapus');
	}

	public function cetak($id)
	{
		if(!Pembayaran::where('no_pb', $id)->exists()){
			abort(404);
		}
		$d = Pembayaran::with('detail')->where('no_pb', $id)->first();
		return view('pembayaran.print', [
			'd'		=> $d
		]);
	}
}

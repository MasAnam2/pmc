<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\Pembayaran;

class LaporanController extends Controller
{

	public function pembelian(Request $r)
	{
		return view('laporan.pembelian');
	}

	public function pembelianCetak(Request $r)
	{
		$po = PurchaseOrder::whereBetween('tgl_po', [
			$r->query('tgl_mulai'), $r->query('tgl_sampai')
		])->get();
		return view('laporan.pembelian_cetak', [
			'po'		=> $po
		]);
	}

	public function pembayaran(Request $r)
	{
		return view('laporan.pembayaran');
	}

	public function pembayaranCetak(Request $r)
	{
		$pb = Pembayaran::whereBetween('tgl_pb', [
			$r->query('tgl_mulai'), $r->query('tgl_sampai')
		])->get();
		return view('laporan.pembayaran_cetak', [
			'pb'		=> $pb
		]);
	}

}

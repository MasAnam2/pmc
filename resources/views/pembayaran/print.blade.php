<!DOCTYPE html>
<html>
<head>
	<title>Cetak Pembayaran</title>
	<style>
	body {
		font-family: sans-serif;
	}
	.header {
		padding-bottom: 30px;
		font-size: 10px;
	}
	.header h1 {
		text-align: center;
	}
	.tbl {
		border-collapse: collapse;
	}
	.tbl td, th {
		border: 1px solid black;
		padding: 7px;
	}
	.midt {
		width: 100%;
		margin: 0;
	}
	.midt td, .midt th {
		border: 0;
		padding: 0;
	}
</style>
</head>
<body>
	<div class="header">
		<img style="float: left;" src="{{ asset('images/logo.jpg') }}" alt="Umbul Rejeki">
		<h1 align="center"><u>BUKTI PEMBAYARAN</u></h1>
		<p align="center">
			Manufacture Of Metal Stamping <br>
			Jl. Raya Serang Cibarusah Km 0 Bekasi – 17530 <br>
			Telp. 021-896771898, 70612769. Fax 021-89677189
		</p>
	</div>
	<hr>
	<table width="100%" style="margin-bottom: 20px">
		<tbody>
			<tr>
				<td width="200px">No Pembayaran</td>
				<td width="300px">: {{ $d->no_pb }}</td>
				<td width="200px">Nama Bank</td>
				<td width="300px">: {{ $d->bank }}</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>: {{ tglIndo($d->tgl_pb) }}</td>
				<td>Alamat Bank</td>
				<td>: {{ $d->almt_bank }}</td>
			</tr>
			<tr>
				<td>Nama Perusahaan</td>
				<td>: {{ $d->nm_peru }}</td>
				<td>No. Rekening</td>
				<td>: {{ $d->no_rek }}</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="tbl" style="margin-bottom: 20px;">
		<thead>
			<tr>
				<th width="10px">NO</th>
				<th>No PO</th>
				<th>No Invoice</th>
				<th>No Faktur Pajak</th>
				<th>Jumlah Tagihan</th>
				<th>PPn (10%)</th>
				<th>Total Bayar</th>
			</tr>
		</thead>
		<tbody>
			@php
			$total = 0;
			@endphp
			@foreach ($d->detail as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $a->no_po }}</td>
				<td>{{ $a->no_invoice }}</td>
				<td>{{ $a->no_fp }}</td>
				<td>{{ $a->tagihan }}</td>
				<td>{{ $a->ppn }}</td>
				<td>
					<table class="midt">
						<tbody>
							<tr>
								<td>Rp.</td>
								<td align="right">{{ rupiah($a->total_bayar) }}</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			@php
				$total += $a->total_bayar;
			@endphp
			@endforeach
			<tr>
				<td colspan="6" align="right">
					<strong>TOTAL</strong>
				</td>
				<td>
					<table class="midt">
						<tbody>
							<tr>
								<td>Rp.</td>
								<td align="right">{{ rupiah($total) }}</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<table width="40%" style="float: right;">
		<tbody>
			<tr>
				<td>
					Penerima
					<br>
					<br>
					<br>
					<br>
					<br>
					<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
				</td>
				<td>
					Hormat Kami
					<br>
					<br>
					<br>
					<br>
					<br>
					<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
				</td>
			</tr>
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>
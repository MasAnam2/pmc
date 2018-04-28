<!DOCTYPE html>
<html>
<head>
	<title>Cetak PO</title>
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
		<h1 align="center"><u>PURCHASING ORDER</u></h1>
	</div>
	<table width="100%" style="margin-bottom: 20px">
		<tbody>
			<tr>
				<td width="200px">No PO</td>
				<td width="300px">: {{ $d->no_po }}</td>
			</tr>
			<tr>
				<td>Kepada Yth</td>
				<td>: {{ $d->supplier->nm_supplier }}</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>: {{ $d->supplier->fax }}</td>
				<td width="30px">Serang</td>
				<td>: {{ date('d-m-Y') }}</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>: {{ $d->supplier->email }}</td>
			</tr>
			<tr>
				<td>No. Telepon </td>
				<td>: {{ $d->supplier->no_telp }}</td>
			</tr>
		</tbody>
	</table>
	Dengan hormat <br>
	Bersama surat ini kami memohon agar dapat segera dikirim material sebagai berikut: 
	<table width="100%" class="tbl" style="margin-bottom: 20px;">
		<thead>
			<tr>
				<th width="10px">NO</th>
				<th>MATERIAL</th>
				<th>Qty</th>
				<th>HARGA SATUAN</th>
				<th>TOTAL</th>
			</tr>
		</thead>
		<tbody>
			@php
			$total = 0;
			@endphp
			@foreach ($d->detail as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $a->material->nm_material }}</td>
				<td align="right">{{ $a->qty }}</td>
				<td>
					<table class="midt">
						<tbody>
							<tr>
								<td>Rp.</td>
								<td align="right">{{ rupiah($a->material->hrg_stn) }}</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td>
					<table class="midt">
						<tbody>
							<tr>
								<td>Rp.</td>
								<td align="right">{{ rupiah($a->total) }}</td>
							</tr>
						</tbody>
					</table>
				</td>
				@php
				$total += $a->total;
				@endphp
			</tr>
			@endforeach
			<tr>
				<td colspan="4" align="center">
					<strong>TOTAL KESELURUHAN</strong>
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
	<table width="40%" style="margin-bottom: 30px;">
		<tbody>
			<tr>
				<td valign="top">Ket</td>
				<td valign="top">:</td>
				<td>
					Harga diatas belum termasuk PPN pembayaran akan dilaksanakan dalam 1(satu) bulan setelah invoice diterima NPWP : 02.199.145.0.413.000 PT. UMBUL REJEKI KP. KANDANG RT.007/004 SUKASARI – SERANG BARU
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
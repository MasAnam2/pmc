<!DOCTYPE html>
<html>
<head>
	<title>Cetak Pembayaran Hutang</title>
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
		<h1 style="padding-top: 20px;" align="center"><u>LAPORAN PEMBAYARAN HUTANG</u></h1>
	</div>
	<table width="100%" class="tbl" style="margin-bottom: 20px;">
		<thead>
			<tr>
				<th width="10px">#</th>
				<th>No Pem</th>
				<th>Tanggal</th>
				<th>Perusahaan</th>
				<th>Bank</th>
				<th>No Rek</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pb as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $a->no_pb }}</td>
				<td>{{ tglIndo($a->tgl_pb) }}</td>
				<td>{{ $a->nm_peru }}</td>
				<td>{{ $a->bank }}</td>
				<td>{{ $a->no_rek }}</td>
				<td align="right">{{ rupiah($a->total_semua) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>
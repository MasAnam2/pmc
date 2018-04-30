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
	<table width="100%" style="margin-bottom: 20px">
		<tbody>
			<tr>
				<td rowspan="3">
					<img style="float: left;" src="{{ asset('images/logo.jpg') }}" alt="Umbul Rejeki">
				</td>
				<td width="120px">Tanggal</td>
				<td width="160px">: {{ tglIndo($d->tgl_pm) }}</td>
			</tr>
			<tr>
				<td>Kepada YTH</td>
				<td>: {{ $d->supplier->nm_supplier }}</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: {{ $d->almt_pm }}</td>
			</tr>
		</tbody>
	</table>
	<h3 align="center"><u>PERMINTAAN MATERIAL</u></h3>
	<table width="100%" class="tbl" style="margin-bottom: 20px;">
		<thead>
			<tr>
				<th width="10px">NO</th>
				<th>Nama Material</th>
				<th>Kuantitas</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($d->detail as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $a->material->nm_material }}</td>
				<td>{{ $a->qty }}</td>
				<td>{{ $a->ket }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<table class="tbl" width="60%" style="float: right;">
		<tbody>
			<tr>
				<td>DISAHKAN</td>
				<td>DISETUJUI</td>
				<td>DIKETAHUI</td>
				<td>PEMOHON</td>
			</tr>
			<tr>
				<td>
					<br><br><br>
				</td>
				<td>
					<br><br><br>
				</td>
				<td>
					<br><br><br>
				</td>
				<td>
					<br><br><br>
				</td>
			</tr>
			<tr>
				<td><br></td>
				<td><br></td>
				<td><br></td>
				<td><br></td>
			</tr>
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>
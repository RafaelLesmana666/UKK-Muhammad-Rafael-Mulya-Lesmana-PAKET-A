<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengaduan Masyarakat Desa Cigombong</title>
    <style>
        table {
            text-align: center;
        }
        th {
            padding: 1rem 2rem;
            border-bottom: 1px solid grey;
			border-top: 1px solid grey;
        }
        td {
            padding: 1rem 0.5rem;
        }
    </style>
</head>
<body>
	<div style="display:flex;flex-direction: row;">
		<img src="kab.png" style="width:4rem;height:4rem;position: absolute;top: 1rem;">
		<div style="text-align: center;">
			<h2>Laporan Pengaduan Masyarakat Desa Cigombong</h2>
			<p>Jl. Raya H.R. Edi Sukma km. 22 No. 12 Cigombong Bogor 16110</p>
		</div>
	</div>
	<hr style="margin-bottom: 2.5rem;">
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Pengaduan</th>
				<th>Laporan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pengaduan as $p)
			<tr>
				<td>{{$p->id}}</td>
				<td>{{$p->tgl_laporan}}</td>
				<td style="width: 18rem;">{{$p->isi_laporan}}</td>
				<td>{{$p->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
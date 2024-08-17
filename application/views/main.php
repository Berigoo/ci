<?php
?><!DOCTYPE html>
<html>
<head>
	<title>Proyek</title>

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>

<h1>Proyek dan Lokasi</h1>
<table>
	<tr>
		<th colspan="8">Proyek</th>
		<th colspan="6">Lokasi</th>
	</tr>
	<tr>
		<th>Proyek ID</th>
		<th>Nama Proyek</th>
		<th>Client</th>
		<th>Tanggal Mulai</th>
		<th>Tanggal Selesai</th>
		<th>Pimpinan Proyek</th>
		<th>Keterangan</th>
		<th>Aksi</th>
		<th>Lokasi ID</th>
		<th>Nama Lokasi</th>
		<th>Negara</th>
		<th>Provinsi</th>
		<th>Kota</th>
		<th>Aksi</th>
	</tr>
	<?php for($i = 0; $i < count($data); $i++) {
		echo "<tr>";
		echo "<td>" . $data[$i]->proyek->id . "</td>";
		echo "<td>" . $data[$i]->proyek->namaProyek . "</td>";
		echo "<td>" . $data[$i]->proyek->client . "</td>";
		echo "<td>" . $data[$i]->proyek->tanggalMulai . "</td>";
		echo "<td>" . $data[$i]->proyek->tanggalSelesai . "</td>";
		echo "<td>" . $data[$i]->proyek->pimpinanProyek . "</td>";
		echo "<td>" . $data[$i]->proyek->keterangan . "</td>";
		echo "<td>" ;
		echo "<a href='/index.php/welcome/proyekedit/" . $data[$i]->proyek->id . "'>Edit</a>&ensp;";
		echo "<a href='/index.php/welcome/proyekdelete/" . $data[$i]->proyek->id . "' style='color: red'>Delete</a> ";
		echo "</td>";


		echo "<td colspan='6'>";
		echo "<table>";
		for ($j = 0; $j < count($data[$i]->lokasis); $j++) {
			echo "<tr>";
			echo "<td>" . $data[$i]->lokasis[$j]->id . "</td>";
			echo "<td>" . $data[$i]->lokasis[$j]->namaLokasi . "</td>";
			echo "<td>" . $data[$i]->lokasis[$j]->negara . "</td>";
			echo "<td>" . $data[$i]->lokasis[$j]->provinsi . "</td>";
			echo "<td>" . $data[$i]->lokasis[$j]->kota . "</td>";

			echo "<td>" ;
			echo "<a href='/index.php/welcome/lokasiedit/" . $data[$i]->lokasis[$j]->id . "'>Edit</a>&ensp;";
			echo "<a href='/index.php/welcome/lokasidelete/" . $data[$i]->proyek->id . "/" . $data[$i]->lokasis[$j]->id . "' style='color: red'>Delete</a> ";
			echo "</td>";

			echo "</tr>";
		}
		echo "</table>";
		echo "</td>";

		echo "</tr>";
	} ?>
</table>
</body>
</html>

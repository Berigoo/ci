<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		input{
			width: 350px;
		}
	</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit Proyek</h1>

    <form action="/index.php/welcome/proyekeditpost" method="POST">
		<label for="id">Id:</label><br>
		<input type="text" id="id" name="id" value="<?php echo $data->proyek->id ?>" readonly><br><br>

        <label for="lokasi_id">Lokasi ID:</label><br>
		<?php
		for ($i = 0; $i < count($data->lokasis); $i++) {
			echo "<select name='lokasi_id[]' id='lokasi_id" . $i . "'>";
			for ($j = 0; $j < count($alllokasi); $j++) {
				$selected = '';
				echo "<option value='" .$alllokasi[$j]->id . "'";
				if($alllokasi[$j]->id == $data->lokasis[$i]->id) echo 'selected';
				echo ">" .  $alllokasi[$j]->namaLokasi . ", " .$alllokasi[$j]->kota . ", " . $alllokasi[$j]->provinsi . ", " . $alllokasi[$j]->negara . "</option>";
			}
			echo "</select><br><br>";
		}
		?>
		<select name="lokasi_id[]" id="lokasi_id">
			<?php
			for ($j = 0; $j < count($alllokasi); $j++) {
				echo "<option value='" .$alllokasi[$j]->id . "'>" .  $alllokasi[$j]->namaLokasi . ", " .$alllokasi[$j]->kota . ", " . $alllokasi[$j]->provinsi . ", " . $alllokasi[$j]->negara . "</option>";
			}
			?>
			<option value="null" selected></option>
		</select>&ensp; assign new lokasi<br><br>

        <label for="nama_proyek">Nama Proyek:</label><br>
        <input type="text" id="nama_proyek" name="nama_proyek" value="<?php echo $data->proyek->namaProyek ?>"><br><br>

        <label for="client">Client:</label><br>
        <input type="text" id="client" name="client" value="<?php echo $data->proyek->client ?>"><br><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label><br>
        <input type="datetime-local" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $data->proyek->tanggalMulai ?>"><br><br>

        <label for="tanggal_selesai">Tanggal Selesai:</label><br>
        <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $data->proyek->tanggalSelesai ?>"><br><br>

        <label for="pimpinan_proyek">Pimpinan Proyek:</label><br>
        <input type="text" id="pimpinan_proyek" name="pimpinan_proyek" value="<?php echo $data->proyek->pimpinanProyek ?>"><br><br>

        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"><?php echo $data->proyek->keterangan ?></textarea><br><br>

<input type="submit" value="Save">
</form>

</body>
</html>

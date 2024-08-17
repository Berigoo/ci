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
    <h1>Tambah Proyek</h1>

    <form action="/index.php/welcome/proyekeditpost" method="POST">
		<label for="id">Id:</label><br>
		<input type="text" id="id" name="id" value="<?php echo $data->proyek->id ?>" readonly><br><br>

        <label for="lokasi_id">Lokasi ID:</label><br>
		<?php
		for ($i = 0; $i < count($data->lokasis); $i++) {
			echo "<input type='number' id='lokasi_id' name='lokasi_id[]' value='" . $data->lokasis[$i]->id . "'><br>";
		}
		?>

		<input type="number" id="lokasi_id" name="lokasi_id[]" placeholder="Assign to new Lokasi"><br><br>

        <label for="nama_proyek">Nama Proyek:</label><br>
        <input type="text" id="nama_proyek" name="nama_proyek" value="<?php echo $data->proyek->namaProyek ?>"><br><br>

        <label for="client">Client:</label><br>
        <input type="text" id="client" name="client" value="<?php echo $data->proyek->client ?>"><br><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label><br>
        <input type="datetime-local" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $data->proyek->tanggalMulai ?>"><br><br>

        <label for="tanggal_selesai">Tanggal Selesai:</label><br>
        <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $data->proyek->tanggalSelesai ?>"><br><br>

        <label for="pimpinan_proyek">Pimpinan Proyek:</label><br>
        <input type="text" id="pimpinan_proyek" name="pimpinan_proyek" value="<?php $data->proyek->pimpinanProyek ?>"><br><br>

        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"><?php echo $data->proyek->keterangan ?></textarea><br><br>

<input type="submit" value="Save">
</form>

</body>
</html>

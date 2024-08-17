<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit Lokasi</h1>

    <form action="/index.php/welcome/lokasieditpost" method="POST">
		<label for="id">Id:</label><br>
		<input type="text" id="id" name="id" value="<?php echo $data->id ?>" readonly><br><br>

        <label for="namaLokasi">Nama Lokasi:</label><br>
        <input type="text" id="namaLokasi" name="nama_lokasi" value="<?php echo $data->namaLokasi ?>"><br><br>

        <label for="negara">Negara:</label><br>
        <input type="text" id="negara" name="negara" value="<?php echo $data->negara ?>"><br><br>

        <label for="provinsi">Provinsi:</label><br>
        <input type="text" id="provinsi" name="provinsi" value="<?php echo $data->provinsi ?>"><br><br>

        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota" value="<?php echo $data->kota ?>"><br><br>

		<input type="submit" value="Save">
	</form>

</body>
</html>

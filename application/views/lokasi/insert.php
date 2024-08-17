<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <h1>Tambah Lokasi</h1>

    <form action="/index.php/welcome/lokasicreate" method="POST">
        <label for="namaLokasi">Nama Lokasi:</label><br>
        <input type="text" id="namaLokasi" name="nama_lokasi"><br><br>

        <label for="negara">Negara:</label><br>
        <input type="text" id="negara" name="negara"><br><br>

        <label for="provinsi">Provinsi:</label><br>
        <input type="text" id="provinsi" name="provinsi"><br><br>

        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota"><br><br>

<input type="submit" value="Save">
</form>

</body>
</html>

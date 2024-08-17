<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <h1>Tambah Proyek</h1>

    <form action="/index.php/welcome/proyekcreate" method="POST">
        <label for="lokasi_id">Lokasi ID:</label><br>
        <input type="number" id="lokasi_id" name="lokasi_id"><br><br>

        <label for="nama_proyek">Nama Proyek:</label><br>
        <input type="text" id="nama_proyek" name="nama_proyek"><br><br>

        <label for="client">Client:</label><br>
        <input type="text" id="client" name="client"><br><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label><br>
        <input type="datetime-local" id="tanggal_mulai" name="tanggal_mulai"><br><br>

        <label for="tanggal_selesai">Tanggal Selesai:</label><br>
        <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai"><br><br>

        <label for="pimpinan_proyek">Pimpinan Proyek:</label><br>
        <input type="text" id="pimpinan_proyek" name="pimpinan_proyek"><br><br>

        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"></textarea><br><br>

<input type="submit" value="Save">
</form>

</body>
</html>

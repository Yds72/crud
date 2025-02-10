<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Pelanggan</h2>
        <form action="proses_tambah_pelanggan.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="namalengkap">Nama Pelanggan</label>
                <input type="text" name="namalengkap" class="form-control" id="namalengkap" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" required>
            </div>

            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" name="telp" class="form-control" id="telp" required>
            </div>

            <div class="form-group">
                <label for="usia">Usia</label>
                <input type="number" name="usia" class="form-control" id="usia" required>
            </div>

            <div class="form-group">
                <label for="buktifotoresep">Bukti Foto Resep</label>
                <input type="file" name="buktifotoresep" class="form-control" id="buktifotoresep" required accept="image/*">
            </div>

            <button type="submit" name="kirim" class="btn btn-primary">Tambah Pelanggan</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_pelanggan.php'">Lihat Daftar Pelanggan</button>
        </form>
    </div>

</body>

</html>

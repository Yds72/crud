<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Karyawan</h2>
        <form action="proses_tambah_karyawan.php" method="POST">
            <div class="form-group">
                <label for="namakaryawan">Nama Karyawan</label>
                <input type="text" name="namakaryawan" class="form-control" id="namakaryawan" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" required>
            </div>

            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" name="telp" class="form-control" id="telp" required>
            </div>

            <button type="submit" name="kirim" class="btn btn-primary">Tambah Karyawan</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_karyawan.php'">Lihat Daftar Karyawan</button>
        </form>
    </div>

</body>

</html>

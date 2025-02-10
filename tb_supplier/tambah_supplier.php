<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Supplier</h2>
        <form action="proses_tambah_supplier.php" method="POST">
            <div class="form-group">
                <label for="perusahaan">Nama Perusahaan</label>
                <input type="text" name="perusahaan" class="form-control" id="perusahaan" required>
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
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required>
            </div>

            <button type="submit" name="kirim" class="btn btn-primary">Tambah Supplier</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_supplier.php'">Lihat Daftar Supplier</button>
        </form>
    </div>

</body>

</html>

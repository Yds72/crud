<?php
include "../koneksi.php";

$supplier_data = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Obat</h2>
        <form action="proses_tambah_obat.php" method="POST">

            <!-- Dropdown Nama Perusahaan Di tb_supplier -->
            <div class="form-group">
                <label for="id_supplier">Nama Perusahaan</label>
                <select name="id_supplier" class="form-control" id="id_supplier" required>
                    <option value="">-- Pilih Perusahaan --</option>
                    <?php while ($supplier = mysqli_fetch_assoc($supplier_data)) { ?>
                        <option value="<?= $supplier['perusahaan'] ?>"><?= $supplier['perusahaan'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Nama Obat -->
            <div class="form-group">
                <label for="namaobat">Nama Obat</label>
                <input type="text" name="namaobat" class="form-control" id="namaobat" required>
            </div>

            <!-- Kategori Obat -->
            <div class="form-group">
                <label for="kategoriobat">Kategori Obat</label>
                <input type="text" name="kategoriobat" class="form-control" id="kategoriobat" required>
            </div>

            <!-- Harga Jual -->
            <div class="form-group">
                <label for="hargajual">Harga Jual</label>
                <input type="number" name="hargajual" class="form-control" id="hargajual" required>
            </div>

            <!-- Harga Beli -->
            <div class="form-group">
                <label for="hargabeli">Harga Beli</label>
                <input type="number" name="hargabeli" class="form-control" id="hargabeli" required>
            </div>

            <!-- Stok Obat -->
            <div class="form-group">
                <label for="stokobat">Stok Obat</label>
                <input type="number" name="stokobat" class="form-control" id="stokobat" required>
            </div>

            <!-- Keterangan -->
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan">
            </div>

            <button type="submit" name="kirim" class="btn btn-primary">Tambah Obat</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_obat.php'">Lihat Daftar Obat</button>
        </form>
    </div>

</body>

</html>
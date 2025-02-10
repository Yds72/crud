<?php
include "../koneksi.php";

$pelanggan_data = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
$karyawan_data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="../bootstrap.css" rel="stylesheet">
    <script>
        // Fungsi untuk menghitung kembalian
        function calculateKembalian() {
            // Mendapatkan nilai dari input total bayar dan bayar
            const totalBayar = parseFloat(document.getElementById('totalbayar').value) || 0;
            const bayar = parseFloat(document.getElementById('bayar').value) || 0;

            // Menghitung kembalian
            const kembalian = bayar - totalBayar;

            // Menampilkan kembalian di input kembalian
            document.getElementById('kembalian').value = kembalian >= 0 ? kembalian : 0;
        }
    </script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Transaksi</h2>
        <form action="proses_tambah_transaksi.php" method="POST">
            <!-- Dropdown ID Pelanggan -->
            <div class="form-group">
                <label for="idpelanggan">Pelanggan</label>
                <select name="idpelanggan" class="form-control" id="idpelanggan" required>
                    <option value="">-- Pilih Nama Pelanggan --</option>
                    <?php while ($pelanggan = mysqli_fetch_assoc($pelanggan_data)) { ?>
                        <option value="<?= $pelanggan['idpelanggan'] ?>"><?= $pelanggan['namalengkap'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Dropdown ID Karyawan -->
            <div class="form-group">
                <label for="idkaryawan">Karyawan</label>
                <select name="idkaryawan" class="form-control" id="idkaryawan" required>
                    <option value="">-- Pilih Nama Karyawan --</option>
                    <?php while ($karyawan = mysqli_fetch_assoc($karyawan_data)) { ?>
                        <option value="<?= $karyawan['idkaryawan'] ?>"><?= $karyawan['namakaryawan'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Tanggal Transaksi -->
            <div class="form-group">
                <label for="tgltransaksi">Tanggal Transaksi</label>
                <input type="date" name="tgltransaksi" class="form-control" id="tgltransaksi" required>
            </div>

            <!-- Kategori Pelanggan -->
            <div class="form-group">
                <label for="kategoripelanggan">Kategori Pelanggan</label>
                <select name="kategoripelanggan" class="form-control" id="kategoripelanggan" required>
                    <option value="">-- Pilih Kategori Pelanggan --</option>
                    <option value="Member VIP">Member VIP</option>
                    <option value="Bukan Member VIP">Bukan Member VIP</option>
                </select>
            </div>


            <!-- Total Bayar -->
            <div class="form-group">
                <label for="totalbayar">Total Bayar</label>
                <input type="number" step="0.01" name="totalbayar" class="form-control" id="totalbayar" required oninput="calculateKembalian()">
            </div>

            <!-- Bayar -->
            <div class="form-group">
                <label for="bayar">Bayar</label>
                <input type="number" step="0.01" name="bayar" class="form-control" id="bayar" required oninput="calculateKembalian()">
            </div>

            <!-- Kembalian -->
            <div class="form-group">
                <label for="kembalian">Kembalian</label>
                <input type="number" step="0.01" name="kembalian" class="form-control" id="kembalian" required readonly>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_transaksi.php'">Lihat Daftar Transaksi</button>
        </form>
    </div>

</body>

</html>
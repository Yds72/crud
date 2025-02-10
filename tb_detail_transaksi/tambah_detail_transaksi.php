<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
    <link href="../bootstrap.css" rel="stylesheet">
    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotal() {
            // Mendapatkan nilai dari input jumlah dan harga satuan
            const jumlah = document.getElementById('jumlah').value;
            const hargaSatuan = document.getElementById('hargasatuan').value;

            // Menghitung total harga
            const totalHarga = jumlah * hargaSatuan;

            // Menampilkan total harga di input totalharga
            document.getElementById('totalharga').value = totalHarga;
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Detail Transaksi</h2>

        <?php
        include "../koneksi.php";

        $transaksi_data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
        $obat_data = mysqli_query($koneksi, "SELECT * FROM tb_obat");
        ?>

        <form action="proses_tambah_detail_transaksi.php" method="POST">

            <!-- Dropdown ID Transaksi -->
            <div class="form-group">
                <label for="idtransaksi">ID Transaksi</label>
                <select name="idtransaksi" class="form-control" id="idtransaksi" required>
                    <option value="">-- Pilih Id Transaksi --</option>
                    <?php while ($transaksi = mysqli_fetch_assoc($transaksi_data)) { ?>
                        <option value="<?= $transaksi['idtransaksi'] ?>"><?= $transaksi['idtransaksi'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Dropdown ID Obat -->
            <div class="form-group">
                <label for="id_obat">ID Obat</label>
                <select name="id_obat" class="form-control" id="id_obat" required>
                    <option value="">-- Pilih Id Obat --</option>
                    <?php while ($obat = mysqli_fetch_assoc($obat_data)) { ?>
                        <option value="<?= $obat['id_obat'] ?>"><?= $obat['namaobat'] ?> (ID: <?= $obat['id_obat'] ?>)</option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" required oninput="calculateTotal()">
            </div>

            <div class="form-group">
                <label for="hargasatuan">Harga Satuan</label>
                <input type="number" name="hargasatuan" class="form-control" id="hargasatuan" required oninput="calculateTotal()">
            </div>

            <div class="form-group">
                <label for="totalharga">Total Harga</label>
                <input type="number" name="totalharga" class="form-control" id="totalharga" required readonly>
            </div>

            <button type="submit" name="kirim" class="btn btn-primary">Tambah Detail Transaksi</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='tampil_detail_transaksi.php'">Lihat Daftar Detail Transaksi</button>
        </form>
    </div>

</body>

</html>

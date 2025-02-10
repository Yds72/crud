<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idtransaksi = $_POST['idtransaksi'];
    $idpelanggan = $_POST['idpelanggan'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $kategoripelanggan = $_POST['kategoripelanggan'];
    $totalbayar = $_POST['totalbayar'];
    $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembalian'];

    $update_query = "UPDATE tb_transaksi SET 
        idpelanggan='$idpelanggan',
        tgltransaksi='$tgltransaksi',
        kategoripelanggan='$kategoripelanggan',
        totalbayar='$totalbayar',
        bayar='$bayar',
        kembalian='$kembalian'
        WHERE idtransaksi='$idtransaksi'";

    $hasil = mysqli_query($koneksi, $update_query);

    if (!$hasil) {
        echo "<script>alert('Gagal memperbarui data transaksi');window.location.href='tampil_transaksi.php?idtransaksi=$idtransaksi'</script>";
    } else {
        echo "<script>alert('Berhasil memperbarui data transaksi');window.location.href='tampil_transaksi.php'</script>";
    }
} else {
    $idtransaksi = $_GET['idtransaksi'];

    $data_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi='$idtransaksi'");
    $data = mysqli_fetch_assoc($data_transaksi);

    $pelanggan_data = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
    $karyawan_data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstrap.css" rel="stylesheet">
        <title>Update Transaksi</title>
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
        <div class="container">
            <h2>Update Data Transaksi</h2>
            <form action="update_transaksi.php" method="POST">
                <input type="hidden" name="idtransaksi" value="<?= $data['idtransaksi'] ?>">

                <div class="mb-3">
                    <label for="idpelanggan" class="form-label">Id Pelanggan</label>
                    <input type="int" class="form-control" id="idpelanggan" name="idpelanggan" value="<?= $data['idpelanggan'] ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="tgltransaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tgltransaksi" name="tgltransaksi" value="<?= $data['tgltransaksi'] ?>">
                </div>

                <div class="mb-3">
                    <label for="kategoripelanggan" class="form-label">Kategori Pelanggan</label>
                    <select name="kategoripelanggan" class="form-control" id="kategoripelanggan" required>
                        <option value="">-- Pilih Kategori Pelanggan --</option>
                        <option value="Member VIP" <?= $data['kategoripelanggan'] === 'Member VIP' ? 'selected' : '' ?>>Member VIP</option>
                        <option value="Bukan Member VIP" <?= $data['kategoripelanggan'] === 'Bukan Member VIP' ? 'selected' : '' ?>>Bukan Member VIP</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="totalbayar" class="form-label">Total Bayar</label>
                    <input type="number" class="form-control" id="totalbayar" name="totalbayar" value="<?= $data['totalbayar'] ?>" oninput="calculateKembalian()">
                </div>

                <div class="mb-3">
                    <label for="bayar" class="form-label">Bayar</label>
                    <input type="number" class="form-control" id="bayar" name="bayar" value="<?= $data['bayar'] ?>" oninput="calculateKembalian()">
                </div>

                <div class="mb-3">
                    <label for="kembalian" class="form-label">Kembalian</label>
                    <input type="number" class="form-control" id="kembalian" name="kembalian" value="<?= $data['kembalian'] ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="tampil_transaksi.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </body>

    </html>

<?php
}
?>
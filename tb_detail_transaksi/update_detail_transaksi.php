<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iddetailtransaksi = $_POST['iddetailtransaksi'];
    $idtransaksi = isset($_POST['idtransaksi']) ? $_POST['idtransaksi'] : null;
    $id_obat = isset($_POST['id_obat']) ? $_POST['id_obat'] : null;
    $jumlah = $_POST['jumlah'];
    $hargasatuan = $_POST['hargasatuan'];
    $totalharga = $_POST['totalharga'];

    if (empty($idtransaksi) || empty($id_obat)) {
        die("Error: idtransaksi atau id_obat tidak valid.");
    }

    $update_query = "UPDATE tb_detail_transaksi SET
        idtransaksi='$idtransaksi',
        id_obat='$id_obat',
        jumlah='$jumlah',
        hargasatuan='$hargasatuan',
        totalharga='$totalharga'
        WHERE iddetailtransaksi='$iddetailtransaksi'";

    if (mysqli_query($koneksi, $update_query)) {
        echo "<script>alert('Berhasil memperbarui detail transaksi');window.location.href='tampil_detail_transaksi.php'</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    $iddetailtransaksi = $_GET['iddetailtransaksi'];

    $data_detail_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE iddetailtransaksi='$iddetailtransaksi'");
    $data = mysqli_fetch_assoc($data_detail_transaksi);

    // Mendapatkan data transaksi dan obat untuk dropdown
    $transaksi_data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
    $obat_data = mysqli_query($koneksi, "SELECT * FROM tb_obat");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstrap.css" rel="stylesheet">
        <title>Update Detail Transaksi</title>
        <script>
            // Fungsi untuk menghitung total harga secara otomatis
            function hitungTotal() {
                var jumlah = document.getElementById('jumlah').value;
                var hargasatuan = document.getElementById('hargasatuan').value;
                var totalharga = document.getElementById('totalharga');

                // Cek apakah jumlah dan harga satuan valid (bukan kosong)
                if (jumlah && hargasatuan) {
                    totalharga.value = jumlah * hargasatuan;
                } else {
                    totalharga.value = 0;
                }
            }
        </script>
    </head>

    <body>
        <div class="container">
            <h2>Update Detail Transaksi</h2>
            <form action="update_detail_transaksi.php" method="POST">
                <input type="hidden" name="iddetailtransaksi" value="<?= $data['iddetailtransaksi'] ?>">

                <div class="mb-3">
                    <label for="idtransaksi" class="form-label">ID Transaksi</label>
                    <select class="form-control" id="idtransaksi" name="idtransaksi_disabled" disabled>
                        <option value="">Pilih Transaksi</option>
                        <?php while ($row = mysqli_fetch_assoc($transaksi_data)) : ?>
                            <option value="<?= $row['idtransaksi']; ?>" <?= $row['idtransaksi'] == $data['idtransaksi'] ? 'selected' : ''; ?>>
                                <?= $row['idtransaksi']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <!-- Kirim nilai idtransaksi sebagai input hidden agar tetap terkirim -->
                    <input type="hidden" name="idtransaksi" value="<?= $data['idtransaksi']; ?>">
                </div>

                <div class="mb-3">
                    <label for="id_obat" class="form-label">ID Obat</label>
                    <select class="form-control" id="id_obat" name="id_obat_disabled" disabled>
                        <option value="">Pilih Obat</option>
                        <?php while ($row = mysqli_fetch_assoc($obat_data)) : ?>
                            <option value="<?= $row['id_obat']; ?>" <?= $row['id_obat'] == $data['id_obat'] ? 'selected' : ''; ?>>
                                <?= $row['id_obat']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <input type="hidden" name="id_obat" value="<?= $data['id_obat']; ?>">
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" oninput="hitungTotal()" required>
                </div>

                <div class="mb-3">
                    <label for="hargasatuan" class="form-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="hargasatuan" name="hargasatuan" value="<?= $data['hargasatuan'] ?>" oninput="hitungTotal()" required>
                </div>

                <div class="mb-3">
                    <label for="totalharga" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" id="totalharga" name="totalharga" value="<?= $data['totalharga'] ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="tampil_detail_transaksi.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

    </body>

    </html>

<?php
}
?>

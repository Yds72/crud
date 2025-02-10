<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idpelanggan = $_POST['idpelanggan'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $usia = $_POST['usia'];

    // Mengecek apakah ada file yang diunggah
    if (!empty($_FILES['buktifotoresep']['name'])) {
        $buktifotoresep = $_FILES['buktifotoresep']['name'];
        $target_dir = "uploads/";

        // Buat folder "uploads" jika belum ada folder "uploads"
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $target_file = $target_dir . basename($buktifotoresep);

        // Cek apakah file yang diunggah adalah gambar
        $check = getimagesize($_FILES['buktifotoresep']['tmp_name']);
        if ($check === false) {
            echo "<script>alert('File is not an image.'); window.location.href='tampil_pelanggan.php?idpelanggan=$idpelanggan';</script>";
            exit;
        }

        // Memindahkan file yang diunggah ke folder uploads
        if (move_uploaded_file($_FILES['buktifotoresep']['tmp_name'], $target_file)) {
            $update_query = "UPDATE tb_pelanggan SET 
                namalengkap='$namalengkap',
                alamat='$alamat',
                telp='$telp',
                usia='$usia',
                buktifotoresep='$target_file' 
                WHERE idpelanggan='$idpelanggan'";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='tampil_pelanggan.php?idpelanggan=$idpelanggan';</script>";
            exit;
        }
    } else {
        // Jika tidak ada file yang diunggah, update hanya data pelanggan tanpa mengubah file foto resep
        $update_query = "UPDATE tb_pelanggan SET 
            namalengkap='$namalengkap',
            alamat='$alamat',
            telp='$telp',
            usia='$usia'
            WHERE idpelanggan='$idpelanggan'";
    }

    $hasil = mysqli_query($koneksi, $update_query);

    if (!$hasil) {
        echo "<script>alert('Gagal memperbarui data pelanggan'); window.location.href='tampil_pelanggan.php?idpelanggan=$idpelanggan';</script>";
    } else {
        echo "<script>alert('Berhasil memperbarui data pelanggan'); window.location.href='tampil_pelanggan.php';</script>";
    }
} else {
    $idpelanggan = $_GET['idpelanggan'];

    $data_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'");
    $data = mysqli_fetch_assoc($data_pelanggan);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstraps.css" rel="stylesheet">
        <title>Update Pelanggan</title>
    </head>

    <body>
        <div class="container">
            <h2>Update Data Pelanggan</h2>
            <form action="update_pelanggan.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idpelanggan" value="<?= $data['idpelanggan'] ?>">

                <div class="mb-3">
                    <label for="namalengkap" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="<?= $data['namalengkap'] ?>">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
                </div>

                <div class="mb-3">
                    <label for="telp" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp'] ?>">
                </div>

                <div class="mb-3">
                    <label for="usia" class="form-label">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia" value="<?= $data['usia'] ?>">
                </div>

                <div class="mb-3">
                    <label for="buktifotoresep" class="form-label">Bukti Foto Resep</label>
                    <input type="file" class="form-control" id="buktifotoresep" name="buktifotoresep" accept="image/*">
                    <small class="form-text text-muted">Upload file foto resep baru jika ingin mengganti.</small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="tampil_pelanggan.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

    </body>

    </html>

<?php
}
?>
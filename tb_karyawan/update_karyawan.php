<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idkaryawan = $_POST['idkaryawan'];
    $namakaryawan = $_POST['namakaryawan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $update_query = "UPDATE tb_karyawan SET 
        namakaryawan='$namakaryawan',
        alamat='$alamat',
        telp='$telp'
        WHERE idkaryawan='$idkaryawan'";

    $hasil = mysqli_query($koneksi, $update_query);

    if (!$hasil) {
        echo "<script>alert('Gagal memperbarui data karyawan');window.location.href='tampil_karyawan.php?idkaryawan=$idkaryawan'</script>";
    } else {
        echo "<script>alert('Berhasil memperbarui data karyawan');window.location.href='tampil_karyawan.php'</script>";
    }
} else {
    $idkaryawan = $_GET['idkaryawan'];

    $data_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE idkaryawan='$idkaryawan'");
    $data = mysqli_fetch_assoc($data_karyawan);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Update Karyawan</title>
    </head>

    <body>
        <div class="container">
            <h2>Update Data Karyawan</h2>
            <form action="update_karyawan.php" method="POST">
                <input type="hidden" name="idkaryawan" value="<?= $data['idkaryawan'] ?>">

                <div class="mb-3">
                    <label for="namakaryawan" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="namakaryawan" name="namakaryawan" value="<?= $data['namakaryawan'] ?>">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
                </div>

                <div class="mb-3">
                    <label for="telp" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="tampil_karyawan.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

    </body>

    </html>

<?php
}
?>
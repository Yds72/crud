<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_supplier = $_POST['id_supplier'];  
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $keterangan = $_POST['keterangan'];

    $update_query = "UPDATE tb_supplier SET 
        perusahaan='$perusahaan',
        alamat='$alamat',
        telp='$telp',
        keterangan='$keterangan'
        WHERE id_supplier='$id_supplier'";  

    $hasil = mysqli_query($koneksi, $update_query);

    if (!$hasil) {
        echo "<script>alert('Gagal memperbarui data supplier');window.location.href='tampil_supplier.php?id_supplier=$id_supplier'</script>";
    } else {
        echo "<script>alert('Berhasil memperbarui data supplier');window.location.href='tampil_supplier.php'</script>";
    }
} else {
    $id_supplier = $_GET['id_supplier'];  

    $data_supplier = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id_supplier'");  // Ganti id_supplier menjadi id_supplier
    $data = mysqli_fetch_assoc($data_supplier);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Supplier</title>
</head>

<body>
    <div class="container">
        <h2>Update Data Supplier</h2>
        <form action="update_supplier.php" method="POST">
            <input type="hidden" name="id_supplier" value="<?= $data['id_supplier'] ?>">  <!-- Ganti id_supplier menjadi id_supplier -->
            
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?= $data['perusahaan'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="tampil_supplier.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>

<?php
}
?>

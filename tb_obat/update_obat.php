<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_obat = $_POST['id_obat'];
    $id_supplier = $_POST['id_supplier'];
    $namaobat = $_POST['namaobat'];
    $kategoriobat = $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok_obat = $_POST['stok_obat'];
    $keterangan = $_POST['keterangan'];

    $update_query = "UPDATE tb_obat SET 
        id_supplier='$id_supplier',
        namaobat='$namaobat',
        kategoriobat='$kategoriobat',
        hargajual='$hargajual',
        hargabeli='$hargabeli',
        stok_obat='$stok_obat',
        keterangan='$keterangan'
        WHERE id_obat='$id_obat'";

    $hasil = mysqli_query($koneksi, $update_query);

    if (!$hasil) {
        echo "<script>alert('Gagal memperbarui data obat');window.location.href='tampil_obat.php?id_obat=$id_obat'</script>";
    } else {
        echo "<script>alert('Berhasil memperbarui data obat');window.location.href='tampil_obat.php'</script>";
    }
} else {
    $id_obat = $_GET['id_obat'];

    $data_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat WHERE id_obat='$id_obat'");
    $data = mysqli_fetch_assoc($data_obat);

    $supplier_data = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap.css" rel="stylesheet">
    <title>Update Obat</title>
</head>

<body>
    <div class="container">
        <h2>Update Data Obat</h2>
        <form action="update_obat.php" method="POST">
            <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
            
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Perusahaan</label>
                <select name="id_supplier" class="form-control">
                    <?php while ($supplier = mysqli_fetch_assoc($supplier_data)) { ?>
                        <option value="<?= $supplier['id_supplier'] ?>" <?= $supplier['id_supplier'] == $data['id_supplier'] ? 'selected' : '' ?>>
                            <?= $supplier['perusahaan'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="namaobat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="namaobat" name="namaobat" value="<?= $data['namaobat'] ?>">
            </div>

            <div class="mb-3">
                <label for="kategoriobat" class="form-label">Kategori Obat</label>
                <input type="text" class="form-control" id="kategoriobat" name="kategoriobat" value="<?= $data['kategoriobat'] ?>">
            </div>

            <div class="mb-3">
                <label for="hargajual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="hargajual" name="hargajual" value="<?= $data['hargajual'] ?>">
            </div>

            <div class="mb-3">
                <label for="hargabeli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="hargabeli" name="hargabeli" value="<?= $data['hargabeli'] ?>">
            </div>

            <div class="mb-3">
                <label for="stok_obat" class="form-label">Stok Obat</label>
                <input type="number" class="form-control" id="stok_obat" name="stok_obat" value="<?= $data['stok_obat'] ?>">
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"><?= $data['keterangan'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="../tb_obat/tampil_obat.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>

<?php
}
?>

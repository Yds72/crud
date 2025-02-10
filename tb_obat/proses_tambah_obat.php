<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    include "../koneksi.php";

    $nama_perusahaan = $_POST['id_supplier'];

    $id_query = mysqli_query($koneksi, "SELECT id_supplier FROM tb_supplier WHERE perusahaan='$nama_perusahaan'");
    $id_result = mysqli_fetch_assoc($id_query);

    if (!$id_result) {
        echo "<script> alert('Nama Perusahaan Tidak Ditemukan');window.location.href='tambah_obat.php' </script>";
        exit;
    }

    $id_supplier = $id_result['id_supplier'];

    $namaobat = $_POST['namaobat'];
    $kategoriobat = $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok_obat = $_POST['stokobat'];
    $keterangan = $_POST['keterangan'];

    $hasil = mysqli_query($koneksi, "INSERT INTO tb_obat VALUES(NULL, '$id_supplier','$namaobat','$kategoriobat','$hargajual','$hargabeli','$stok_obat','$keterangan')");

    if (!$hasil) {
        echo "<script> alert('Gagal memasukkan data obat');window.location.href='tambah_obat.php' </script>";
    } else {
        echo "<script> alert('Berhasil memasukkan data obat');window.location.href='tampil_obat.php' </script>";
    }


    ?>


</body>

</html>
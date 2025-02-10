<?php
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO tb_supplier (perusahaan, alamat, telp, keterangan) VALUES ('$perusahaan', '$alamat', '$telp', '$keterangan')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data supplier berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='tampil_supplier.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data supplier!');</script>";
    }
}
?>

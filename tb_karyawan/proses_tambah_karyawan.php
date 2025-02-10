<?php
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    $namakaryawan = $_POST['namakaryawan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $query = "INSERT INTO tb_karyawan (namakaryawan, alamat, telp) VALUES ('$namakaryawan', '$alamat', '$telp')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data karyawan berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='tampil_karyawan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data karyawan!');</script>";
    }
}
?>

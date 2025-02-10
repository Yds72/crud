<?php
include "../koneksi.php";

$idkaryawan = $_GET['idkaryawan'];

$delete_login = mysqli_query($koneksi, "DELETE FROM tb_login WHERE idkaryawan='$idkaryawan'");

if ($delete_login) {
    $delete_karyawan = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE idkaryawan='$idkaryawan'");
    
    if ($delete_karyawan) {
        echo "<script>
            alert('Data Berhasl Di Hapus');window.location.href = 'tampil_karyawan.php';</script>";
    } else {
        echo "<script>
            alert('Data Gagal Di Hapus');window.location.href = 'tampil_karyawan.php';</script>";
    }
}
?>

<?php
include "../koneksi.php";

$idpelanggan = $_GET['idpelanggan'];

$delete_pelanggan = mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'");

if ($delete_pelanggan) {
    echo "<script>
        alert('Data Berhasil Dihapus');window.location.href = 'tampil_pelanggan.php';</script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus');window.location.href = 'tampil_pelanggan.php';</script>";
}
?>

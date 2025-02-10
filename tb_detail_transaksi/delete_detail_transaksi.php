<?php
include "../koneksi.php";

$iddetailtransaksi = $_GET['iddetailtransaksi'];

$delete_detail = mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi='$iddetailtransaksi'");

if ($delete_detail) {
    echo "<script>alert('Data Berhasil Dihapus');window.location.href = 'tampil_detail_transaksi.php';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');window.location.href = 'tampil_detail_transaksi.php';</script>";
}

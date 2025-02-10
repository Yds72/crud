<?php
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    $idtransaksi = $_POST['idtransaksi'];
    $id_obat = $_POST['id_obat'];
    $jumlah = $_POST['jumlah'];
    $hargasatuan = $_POST['hargasatuan'];
    $totalharga = $jumlah * $hargasatuan;

    $query = "INSERT INTO tb_detail_transaksi (idtransaksi, id_obat, jumlah, hargasatuan, totalharga) VALUES ('$idtransaksi', '$id_obat', '$jumlah', '$hargasatuan', '$totalharga')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Detail transaksi berhasil ditambahkan!');</script>";
        echo "<script>window.location.href='tampil_detail_transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan detail transaksi!');</script>";
    }
}
?>

<?php
include "../koneksi.php";

$idpelanggan = $_POST['idpelanggan'];
$idkaryawan = $_POST['idkaryawan'];
$tgltransaksi = $_POST['tgltransaksi'];
$kategoripelanggan = $_POST['kategoripelanggan'];
$totalbayar = $_POST['totalbayar'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembalian'];

$check_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan = '$idpelanggan'");

if (mysqli_num_rows($check_pelanggan) == 0) {
    echo "<script> alert('Pelanggan tidak ditemukan.');window.location.href='tambah_transaksi.php' </script>";
    exit;
}

$query = "INSERT INTO tb_transaksi 
          (idtransaksi, idpelanggan, idkaryawan, tgltransaksi, kategoripelanggan, totalbayar, bayar, kembalian) 
          VALUES (NULL, '$idpelanggan', '$idkaryawan', '$tgltransaksi', '$kategoripelanggan', '$totalbayar', '$bayar', '$kembalian')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    echo "<script> alert('Gagal memasukkan data transaksi');window.location.href='tambah_transaksi.php' </script>";
} else {
    echo "<script> alert('Berhasil memasukkan data transaksi');window.location.href='tampil_transaksi.php' </script>";
}

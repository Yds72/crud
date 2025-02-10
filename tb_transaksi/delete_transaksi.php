<?php
include "../koneksi.php";

if (isset($_GET['idtransaksi'])) {
    $idtransaksi = $_GET['idtransaksi'];

    $hasil = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE idtransaksi='$idtransaksi'");

    if ($hasil) {
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href='tampil_transaksi.php'; // Redirect to the list page after deletion
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Dihapus!');
            window.location.href='tampil_transaksi.php'; // Redirect back even if deletion fails
        </script>";
    }
} else {
    echo "<script>
        alert('ID Transaksi tidak ditemukan!');
        window.location.href='tampil_transaksi.php'; // Redirect back if no idtransaksi is provided
    </script>";
}

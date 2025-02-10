<?php
include "../koneksi.php";

$id_obat = $_GET['id_obat'];
$hasil = mysqli_query($koneksi, "DELETE FROM tb_obat WHERE id_obat='$id_obat'");

if ($hasil) {
    echo "<script>
        alert('Data Berhasil Dihapus!');
        window.location.href='tampil_obat.php'; // Redirect to the list page after deletion
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus!');
        window.location.href='tampil_obat.php'; // Redirect back even if deletion fails
    </script>";
}

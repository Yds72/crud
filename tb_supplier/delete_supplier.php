<?php
include "../koneksi.php";

$id_supplier = $_GET['id_supplier'];

// Hapus data di tb_obat yang terkait dengan supplier
$delete_obat = mysqli_query($koneksi, "DELETE FROM tb_obat WHERE id_supplier='$id_supplier'");

// Jika penghapusan dari tb_obat berhasil, hapus dari tb_supplier
if ($delete_obat) {
    $delete_supplier = mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$id_supplier'");

    if ($delete_supplier) {
        echo "<script>alert('Supplier berhasil dihapus');window.location.href='tampil_supplier.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus supplier');window.location.href='tampil_supplier.php';</script>";
    }
} else {
    echo "<script>alert('Gagal menghapus data terkait di tb_obat');window.location.href='tampil_supplier.php';</script>";
}
?>

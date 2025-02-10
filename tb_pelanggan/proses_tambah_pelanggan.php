<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $usia = $_POST['usia'];

    $buktifotoresep = $_FILES['buktifotoresep']['name'];
    $target_dir = "uploads/"; 

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($buktifotoresep);

    $check = getimagesize($_FILES['buktifotoresep']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    if (move_uploaded_file($_FILES['buktifotoresep']['tmp_name'], $target_file)) {
        $query = "INSERT INTO tb_pelanggan (namalengkap, alamat, telp, usia, buktifotoresep) 
                  VALUES ('$namalengkap', '$alamat', '$telp', '$usia', '$target_file')";
        $hasil = mysqli_query($koneksi, $query);

        if ($hasil) {
            echo "<script>alert('Pelanggan berhasil ditambahkan!'); window.location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan.'); window.location.href='tambah_pelanggan.php';</script>";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

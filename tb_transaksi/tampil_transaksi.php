<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>

<body>
    <div class="con">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h2 class="mb-4">
                    <center>Daftar Transaksi</center>
                </h2>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">ID Pelanggan</th>
                            <th scope="col">ID Karyawan</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Kategori Pelanggan</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Bayar</th>
                            <th scope="col">Kembalian</th>
                            <th scope="col" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../koneksi.php";
                        $no = 1;
                        $data_transaksi = mysqli_query($koneksi, "SELECT idtransaksi, idpelanggan, idkaryawan, tgltransaksi, kategoripelanggan, totalbayar, bayar, kembalian FROM tb_transaksi");
                        while ($data = mysqli_fetch_assoc($data_transaksi)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data['idtransaksi'] ?></td>
                                <td><?= $data['idpelanggan'] ?></td>
                                <td><?= $data['idkaryawan'] ?></td>
                                <td><?= $data['tgltransaksi'] ?></td>
                                <td><?= $data['kategoripelanggan'] ?></td>
                                <td><?= $data['totalbayar'] ?></td>
                                <td><?= $data['bayar'] ?></td>
                                <td><?= $data['kembalian'] ?></td>
                                <td><a href="update_transaksi.php?idtransaksi=<?= $data['idtransaksi'] ?>"
                                        class="btn btn-warning">Update</a></td>
                                <td><a href="delete_transaksi.php?idtransaksi=<?= $data['idtransaksi'] ?>"
                                        class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
    </div>
    <div class="link-container">
        <a href="tambah_transaksi.php" class="link-text">Tambah Transaksi?</a>
        <a href="../home.php" class="link-text">Kembali Ke Home</a>
    </div>


    </center>
</body>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    .con {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 30px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .table thead {
        background-color: #3498db;
        color: #ffffff;
    }

    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table tbody tr:hover {
        background-color: #f5f9ff;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-warning {
        background-color: #f39c12;
    }

    .btn-warning:hover {
        background-color: #e67e22;
    }

    .btn-danger {
        background-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .action-links {
        margin-top: 20px;
        text-align: center;
    }

    .action-links a {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 10px;
        background-color: #2980b9;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .action-links a:hover {
        background-color: #3498db;
    }

    .link-container {
        text-align: center;
        margin-top: 20px;
    }

    .link-text {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 10px;
        background-color: #2980b9;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .link-text:hover {
        background-color: #3498db;
    }

    .link-text:first-child {
        background-color: #f39c12;
    }

    .link-text:first-child:hover {
        background-color: #e67e22;
    }
</style>

</html>
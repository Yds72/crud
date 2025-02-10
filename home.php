<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 600px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #333;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        .nav-links {
            list-style: none;
            padding: 0;
        }

        .nav-links li {
            margin: 15px 0;
        }

        .nav-links li a {
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(135deg, #007bff, #00d2ff);
            padding: 10px 20px;
            border-radius: 30px;
            transition: background 0.5s, transform 0.3s, box-shadow 0.3s;
            display: inline-block;
            width: 100%;
            max-width: 280px;
        }

        .nav-links li a:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #00d2ff, #007bff);
            transition: background 0.5s, transform 0.3s, box-shadow 0.3s;
        }

        .nav-links li a:active {
            transform: scale(0.95);
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }

        /* Tombol Logout */
        .logout-btn {
            margin-top: 20px;
            background: linear-gradient(135deg, #ff4e50, #f9d423);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.5s, transform 0.3s, box-shadow 0.3s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #f9d423, #ff4e50);
        }

        .logout-btn:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>HALOOOOOOO</h1>
        <h1><span id="welcome-message">Selamat Datang!</span></h1>
        <p>Ini adalah halaman utama, Anda ingin pergi ke halaman mana?</p>
        <ul class="nav-links">
            <li><a href="./tb_detail_transaksi/tampil_detail_transaksi.php" target="_blank">Data Detail Transaksi</a></li>
            <li><a href="./tb_obat/tampil_obat.php" target="_blank">Data Obat</a></li>
            <li><a href="./tb_karyawan/tampil_karyawan.php" target="_blank">Data Karyawan</a></li>
            <li><a href="./tb_supplier/tampil_supplier.php" target="_blank">Data Supplier</a></li>
            <li><a href="./tb_pelanggan/tampil_pelanggan.php" target="_blank">Data Pelanggan</a></li>
            <li><a href="./tb_transaksi/tampil_transaksi.php" target="_blank">Data Transaksi</a></li>
            <li><a href="./tb_data_login/tampil_login.php" target="_blank">Data Login</a></li>
        </ul>

        <!-- Tombol Logout -->
        <button class="logout-btn" onclick="logout()">Log Out</button>
        

        <div class="footer">
            <p>&copy; 2024 Data Apotek</p>
        </div>
    </div>

</body>

<script>
    // Fungsi untuk mendapatkan username 
    function getUsers() {
        const storedUser = JSON.parse(localStorage.getItem("user"));
        if (storedUser) {
            return storedUser.username;
        } else {
            return null;
        }
    }

    // Fungsi untuk logout dan menghapus data 
    function logout() {
        const username = getUsers(); // Mendapatkan username untuk ditampilkan di pesan konfirmasi
        let message = username ? "Anda akan keluar dari akun, " + username + "." 
                               : "Anda akan keluar dari akun.";
        // Tampilkan konfirmasi dengan dua opsi: OK dan Batal
        if (confirm(message)) {
            localStorage.removeItem("user"); // Menghapus data user 
            window.location.href = 'login2.php'; // Mengarahkan ke halaman login setelah logout
        } else {
            // Jika Batal ditekan, tidak terjadi apa-apa
            console.log("Logout dibatalkan");
        }
    }

    // Menampilkan pesan selamat datang dengan username
    const username = getUsers();
    if (username) {
        document.getElementById("welcome-message").textContent = "Selamat Datang, " + username + "!";
    } else {
        document.getElementById("welcome-message").textContent = "Selamat Datang!";
    }
</script>

</html>
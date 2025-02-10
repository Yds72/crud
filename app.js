const express = require('express');
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');
const app = express();

// Middleware untuk parsing request body
app.use(bodyParser.urlencoded({ extended: true }));

// Simulasi "database" dengan array kosong untuk menyimpan pengguna
let users = [];

// Endpoint untuk proses Signup
app.post('/signup', async (req, res) => {
    const { username, fullname, password } = req.body;

    // Mengacak level user, admin atau user
    const userLevel = Math.random() < 0.5 ? 'admin' : 'user';

    // Hash password dengan bcrypt
    const hashedPassword = await bcrypt.hash(password, 10);

    // Simpan user baru ke array
    users.push({
        username,
        fullname,
        password: hashedPassword,
        level: userLevel
    });

    res.status(200).send('Signup berhasil');
});

// Endpoint untuk proses Login
app.post('/login', async (req, res) => {
    const { username, password } = req.body;

    // Cari user berdasarkan username
    const user = users.find(u => u.username === username);

    if (!user) {
        return res.status(400).send('User tidak ditemukan');
    }

    // Verifikasi password yang dimasukkan dengan password yang di-hash
    const isPasswordValid = await bcrypt.compare(password, user.password);

    if (!isPasswordValid) {
        return res.status(400).send('Password salah');
    }

    // Jika login berhasil, kirim status OK
    res.status(200).send('Login berhasil');
});

// Jalankan server di port 3000
app.listen(3000, () => {
    console.log('Server berjalan di port 3000');
});

CREATE TABLE siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(30) NOT NULL,
    kelas VARCHAR(20),
    jurusan VARCHAR(30),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL
);
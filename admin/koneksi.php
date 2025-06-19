<?php
// Konfigurasi Database
$host     = 'db.be-mons1.bengt.wasmernet.com';
$username = '45c49a7c78418000fa25e9e4ca09';
$password = '068545c4-9a7c-79c2-8000-76ee0f7f9f8b';
$database = 'SapujagaD';  

// Membuat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Mengatur charset UTF-8 untuk mendukung karakter Indonesia
$koneksi->set_charset("utf8");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    // Uncomment baris di bawah untuk testing (hapus saat production)
    // echo "Koneksi berhasil!";
}
?>

<?php
// Konfigurasi Database
$host     = 'sql112.infinityfree.com';
$username = 'if0_39239825';
$password = 'kHKEjnr5IqY ';
$database = 'if0_39239825_sapu';  

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

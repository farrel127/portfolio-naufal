<?php
// PENTING:
// Nama database sudah diisi "naufal".
// Tapi kamu MASIH HARUS mengisi $host, $user, dan $pass dari penyedia database Cloud kamu.
// Vercel TIDAK BISA membaca database di laptop (localhost), harus database online.

$host = 'naufal-378bff75-rahmatasenk1234-dedc.l.aivencloud.com'; // Contoh: containers-us-west.railway.app
$db   = 'defaultdb';             // <-- Sudah diupdate
$user = 'avnadmin';        // Copy dari dashboard Railway/Aiven
$pass = 'AVNS_pM6MLS_WEIXdchVh2c2';        // Copy dari dashboard Railway/Aiven
$port = '11688';               // Biasanya 3306 (MySQL)

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Jika koneksi gagal, variabel pdo jadi null
    $pdo = null;
    // Hilangkan komentar di bawah ini jika ingin melihat pesan error (jangan saat live)
    // echo "Koneksi Gagal: " . $e->getMessage();
}
?>

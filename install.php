<?php
// Kita panggil file koneksi yang sudah kamu isi host, user, password Aiven tadi
require 'db.php';

try {
    // Ini perintah SQL untuk bikin tabel
    $sql = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Kita eksekusi perintahnya
    if ($pdo) {
        $pdo->exec($sql);
        echo "<div style='font-family:sans-serif; text-align:center; margin-top:50px;'>";
        echo "<h1 style='color:green; font-size:40px;'>BERHASIL! 🎉</h1>";
        echo "<p>Tabel 'messages' sudah dibuat otomatis oleh script ini.</p>";
        echo "<p>Sekarang kamu bisa tutup halaman ini dan coba isi pesan di halaman utama.</p>";
        echo "</div>";
    } else {
        echo "<h1 style='color:red;'>Koneksi Gagal</h1>";
        echo "<p>Cek file db.php kamu. Pastikan Host, User, Password, dan Port dari Aiven sudah benar.</p>";
    }

} catch (PDOException $e) {
    echo "<h1>Error:</h1>";
    echo $e->getMessage();
}
?>
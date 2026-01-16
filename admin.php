<?php
require 'db.php';

// --- SETTING PASSWORD ADMIN ---
$password_akses = 'naufal123'; // Ganti ini biar aman!
// -----------------------------

if (!isset($_GET['kunci']) || $_GET['kunci'] != $password_akses) {
    die("<body style='background:#0f172a; color:white; display:flex; justify-content:center; align-items:center; height:100vh; font-family:sans-serif;'>
            <div style='text-align:center;'>
                <h1>AKSES DITOLAK 🔒</h1>
                <p>Masukkan kunci di URL. Contoh: admin.php?kunci=naufal123</p>
            </div>
         </body>");
}

$messages = [];
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll();
} else {
    echo "Database belum konek.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pesan Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen p-10 font-sans text-slate-200">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-400">Kotak Masuk 📬</h1>
            <a href="index.php" class="bg-indigo-600 px-4 py-2 rounded text-white text-sm hover:bg-indigo-500">Lihat Web</a>
        </div>

        <div class="bg-slate-800 rounded-xl overflow-hidden shadow-2xl border border-slate-700">
            <table class="w-full text-left">
                <thead class="bg-slate-950 text-slate-400 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Pesan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    <?php if (count($messages) > 0): ?>
                        <?php foreach ($messages as $msg): ?>
                        <tr class="hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-sm text-slate-400 whitespace-nowrap">
                                <?php echo date('d M Y, H:i', strtotime($msg['created_at'])); ?>
                            </td>
                            <td class="px-6 py-4 font-bold text-white whitespace-nowrap">
                                <?php echo htmlspecialchars($msg['name']); ?>
                            </td>
                            <td class="px-6 py-4 text-indigo-300 text-sm whitespace-nowrap">
                                <?php echo htmlspecialchars($msg['email']); ?>
                            </td>
                            <td class="px-6 py-4 text-slate-300">
                                <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-500 italic">Belum ada pesan masuk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
require 'db.php';

$status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if ($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $message])) {
                $status = "success";
            } else {
                $status = "error";
            }
        } catch (Exception $e) {
            $status = "error";
        }
    } else {
        $status = "db_error";
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Naufal Farrel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: { primary: '#6366f1', dark: '#0f172a' }
                }
            }
        }
    </script>
    <style>
        .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="bg-dark text-white overflow-x-hidden">

    <nav class="fixed w-full z-50 glass px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold tracking-wider text-primary">PORTFOLIO.</h1>
        <div class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="#home" class="hover:text-primary transition">Home</a>
            <a href="#projects" class="hover:text-primary transition">Projects</a>
            <a href="#certificates" class="hover:text-primary transition">Certificates</a>
            <a href="#contact" class="px-4 py-2 bg-primary rounded-full hover:bg-indigo-600 transition">Contact</a>
        </div>
    </nav>

    <section id="home" class="min-h-screen flex items-center justify-center px-6 relative pt-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        
        <div class="text-center z-10 max-w-3xl">
            <h2 class="text-primary font-semibold mb-4 tracking-widest">HELLO, I'M</h2>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">Naufal Farrel <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-400">Pratama.</span></h1>
            <p class="text-gray-400 mb-8 text-lg">Web Developer & UI/UX Designer.</p>
            <a href="#contact" class="inline-block border border-primary text-primary px-8 py-3 rounded-full hover:bg-primary hover:text-white transition duration-300">Let's Talk</a>
        </div>
    </section>

    <section id="projects" class="py-20 px-6 max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center">Featured Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="glass p-6 rounded-2xl hover:-translate-y-2 transition duration-300">
                <img src="foto-evoting.jpeg" alt="E-Voting Project" class="w-full h-40 object-cover rounded-xl mb-4 border border-gray-700">
                <h3 class="text-xl font-bold mb-2">E-Voting Web</h3>
                <p class="text-gray-400 text-sm mb-4">Pemilihan Ketua dan Wakil Ketua OSIS SMK Negeri 1 Bojong Purwakarta.</p>
                <div class="flex gap-2">
                    <span class="text-xs bg-gray-800 px-2 py-1 rounded">2023</span>
                </div>
            </div>

            <div class="glass p-6 rounded-2xl hover:-translate-y-2 transition duration-300">
                <img src="samsat.jpeg" alt="Samsat App" class="w-full h-40 object-cover rounded-xl mb-4 border border-gray-700">
                <h3 class="text-xl font-bold mb-2">Samsat App</h3>
                <p class="text-gray-400 text-sm mb-4">Tugas Akhir Semester.</p>
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">2025</span>
            </div>

            <div class="glass p-6 rounded-2xl hover:-translate-y-2 transition duration-300">
                <img src="https://via.placeholder.com/400x300" alt="Coming Soon" class="w-full h-40 object-cover rounded-xl mb-4 border border-gray-700">
                <h3 class="text-xl font-bold mb-2">Coming Soon</h3>
                <p class="text-gray-400 text-sm mb-4">Project selanjutnya sedang dikerjakan.</p>
                <span class="text-xs bg-gray-800 px-2 py-1 rounded">Soon</span>
            </div>

        </div>
    </section>

    <section id="certificates" class="py-10 px-6 max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center">Certificates</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="glass p-6 rounded-2xl hover:-translate-y-2 transition duration-300 flex flex-col items-center text-center">
                <img src="ser1.jpeg" alt="Sertifikat 1" class="w-full h-64 object-cover rounded-xl mb-4 border border-gray-700">
                <h3 class="text-xl font-bold mb-1">Oracle Academy</h3>
                <p class="text-gray-400 text-sm mb-3">Pemrograman Java 1</p>
                <span class="text-xs border border-primary text-primary px-3 py-1 rounded-full">2025</span>
            </div>

            <div class="glass p-6 rounded-2xl hover:-translate-y-2 transition duration-300 flex flex-col items-center text-center">
                <img src="ser2.jpeg" alt="Sertifikat 2" class="w-full h-64 object-cover rounded-xl mb-4 border border-gray-700">
                <h3 class="text-xl font-bold mb-1">Oracle Academy</h3>
                <p class="text-gray-400 text-sm mb-3">Pemrograman Java 2</p>
                <span class="text-xs border border-primary text-primary px-3 py-1 rounded-full">2025</span>
            </div>

        </div>
    </section>

    <section id="contact" class="py-20 px-6 max-w-4xl mx-auto">
        <div class="glass p-8 md:p-12 rounded-3xl">
            <h2 class="text-3xl font-bold mb-2 text-center">Get In Touch</h2>
            <p class="text-gray-400 text-center mb-8">Kirim pesan untuk saya.</p>

            <?php if ($status == 'success'): ?>
                <div class="bg-green-500/20 text-green-300 p-4 rounded-xl mb-6 text-center border border-green-500/50">Pesan Terkirim!</div>
            <?php elseif ($status == 'db_error'): ?>
                <div class="bg-red-500/20 text-red-300 p-4 rounded-xl mb-6 text-center border border-red-500/50">Gagal Konek Database! Cek file db.php</div>
            <?php endif; ?>

            <form action="#contact" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nama</label>
                        <input type="text" name="name" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 focus:border-primary focus:outline-none text-white transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 focus:border-primary focus:outline-none text-white transition">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Pesan</label>
                    <textarea name="message" rows="4" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 focus:border-primary focus:outline-none text-white transition"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-indigo-600 text-white font-bold py-4 rounded-xl transition duration-300 shadow-lg shadow-indigo-500/30">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <footer class="text-center py-8 text-gray-600 text-sm">&copy; 2026 Naufal Farrel.</footer>
</body>
</html>
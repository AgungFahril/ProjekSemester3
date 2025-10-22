<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Tahura Raden Soerjo</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ✅ Navbar khusus admin -->
    <header>
        <nav class="navbar">
            <a href="dashboard.php" class="nav-brand">🌲 Admin - Tahura Raden Soerjo</a>
            <ul class="nav-menu">
                <li><a href="dashboard.php" class="active">Dashboard</a></li>
                <li><a href="kelola_pendaki.php">Kelola Pendaki</a></li>
                <li><a href="kelola_booking.php">Kelola Booking</a></li>
                <li><a href="kelola_pembayaran.php">Kelola Pembayaran</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="pengaturan.php">Pengaturan</a></li>
                <li><a href="../backend/logout.php" class="login-btn">Logout</a></li>
                <li><span class="user-name">👋 <?= htmlspecialchars($_SESSION['nama']); ?></span></li>
            </ul>
        </nav>
    </header>

    <!-- ✅ Tampilan hero seperti index -->
    <main>
        <section class="hero" style="background-image: url('../images/mountain-bg.jpg'); background-size: cover; background-position: center;">
            <div class="hero-content">
                <h1>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?> 👋</h1>
                <p>Anda sedang berada di halaman <strong>Dashboard Admin</strong> Tahura Raden Soerjo.</p>
            </div>
        </section>

        <!-- ✅ Statistik admin -->
        <section class="stats-section">
            <div class="stat-card">
                <p class="stat-number">128</p>
                <p class="stat-label">Total Pendaki</p>
                <span>Jumlah pendaki terdaftar</span>
            </div>
            <div class="stat-card">
                <p class="stat-number">58</p>
                <p class="stat-label">Total Booking</p>
                <span>Data pemesanan tiket</span>
            </div>
            <div class="stat-card">
                <p class="stat-number">12</p>
                <p class="stat-label">Pembayaran Pending</p>
                <span>Menunggu konfirmasi</span>
            </div>
        </section>

        <!-- ✅ Menu Cepat Admin -->
        <section class="info-section">
            <h2>Menu Cepat</h2>
            <div class="booking-steps">
                <div class="step">
                    <h3>Kelola Pendaki</h3>
                    <p>Tambah, ubah, dan hapus data pendaki.</p>
                    <a href="kelola_pendaki.php" class="btn btn-primary">Buka</a>
                </div>
                <div class="step">
                    <h3>Kelola Booking</h3>
                    <p>Lihat semua transaksi dan status pemesanan tiket pendaki.</p>
                    <a href="kelola_booking.php" class="btn btn-primary">Buka</a>
                </div>
                <div class="step">
                    <h3>Kelola Pembayaran</h3>
                    <p>Verifikasi bukti pembayaran dan atur status transaksi.</p>
                    <a href="kelola_pembayaran.php" class="btn btn-primary">Buka</a>
                </div>
                <div class="step">
                    <h3>Laporan</h3>
                    <p>Unduh laporan bulanan atau tahunan pendakian.</p>
                    <a href="laporan.php" class="btn btn-primary">Buka</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Tahura Raden Soerjo. All Rights Reserved.</p>
    </footer>

</body>
</html>

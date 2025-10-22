<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<nav class="navbar">
    <a href="admin/dashboard.php" class="nav-brand">🌲 Admin - Tahura Raden Soerjo</a>
    <ul class="nav-menu">
        <li><a href="admin/dashboard.php">Dashboard</a></li>
        <li><a href="admin/kelola_pendaki.php">Kelola Pendaki</a></li>
        <li><a href="admin/kelola_booking.php">Kelola Booking</a></li>
        <li><a href="admin/kelola_pembayaran.php">Kelola Pembayaran</a></li>
        <li><a href="admin/laporan.php">Laporan</a></li>
        <li><a href="admin/pengaturan.php">Pengaturan</a></li>
        <li><a href="backend/logout.php" class="login-btn">Logout</a></li>
        <li><span class="user-name">👋 <?= htmlspecialchars($_SESSION['nama'] ?? 'Admin'); ?></span></li>
    </ul>
</nav>

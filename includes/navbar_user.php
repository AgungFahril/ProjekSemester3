<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
    <a href="index.php" class="nav-brand">Tahura Raden Soerjo</a>
    <ul class="nav-menu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="sop.php">SOP Pendaki</a></li>
        <li><a href="PanduanBooking.php">Panduan Booking</a></li>
        <li><a href="PanduanPembayaran.php">Panduan Pembayaran</a></li>
        <li><a href="StatusBooking.php">Status Booking</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <li><a href="admin/dashboard.php">Dashboard</a></li>
            <?php else: ?>
                <li><a href="pengunjung/dashboard.php">Dashboard</a></li>
            <?php endif; ?>

            <li><a href="backend/logout.php" class="login-btn">Logout</a></li>
            <li><span class="user-name">👋 Halo, <?= htmlspecialchars($_SESSION['nama'] ?? 'Pendaki'); ?></span></li>
        <?php else: ?>
            <li><a href="login.php" class="login-btn">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

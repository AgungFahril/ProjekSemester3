<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SESSION['role'] != 'pendaki') {
    header("Location: ../admin/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pengunjung</title>
</head>
<body>
    <h1>Halo, <?php echo $_SESSION['nama']; ?>! Selamat datang di halaman pendaki.</h1>
    <a href="../backend/logout.php">Logout</a>
</body>
</html>

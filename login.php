<?php
// Memulai sesi untuk bisa membaca $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Logika untuk menampilkan pesan error login
$error_message = '';
if (isset($_SESSION['login_error'])) {
    $error_message = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // Hapus pesan setelah dibaca
}

// Opsional: Cek jika sudah login, redirect ke halaman lain
// if (isset($_SESSION['user_id'])) {
//     header('Location: index.php'); // Atau ke dashboard pengunjung
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tahura Raden Soerjo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="auth-page"> <div class="auth-container">
        <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <a href="index.php" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <h1 class="auth-title">Masuk Sekarang</h1>
                <p class="auth-subtitle" style="margin-bottom: 1.5rem; color: #666;">Gunakan akun Anda untuk melanjutkan booking pendakian</p>

                <?php if (!empty($error_message)): ?>
                    <p style="color: red; margin-bottom: 1rem; text-align: center; background-color: #ffebee; padding: 10px; border-radius: 5px; border: 1px solid #e57373;">
                        <?= htmlspecialchars($error_message); ?>
                    </p>
                <?php endif; ?>

                <form action="backend/login.php" method="POST" class="auth-form">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                            <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i> </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                </form>

                <p class="auth-link">
                    Belum punya akun?
                    <a href="register.php">Daftar sekarang</a>
                </p>

                <div class="separator"><span>atau</span></div>

                <button type="button" class="btn btn-google" onclick="alert('Fitur login Google belum tersedia');">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                         alt="Google logo" class="google-logo">
                    Masuk dengan Google
                </button>
            </div>
        </div>

        <div class="auth-image-section">
            </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
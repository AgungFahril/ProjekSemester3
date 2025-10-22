<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pendakian Gunung Raung</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Favicon (optional) -->
    <link rel="icon" type="image/png" href="assets/favicon.png">
</head>
<body class="auth-page">
    <div class="auth-container">
        <!-- Bagian kiri: form -->
        <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <a href="index.php" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

                <h1 class="auth-title">Masuk Sekarang</h1>
                <p class="auth-subtitle">Gunakan akun Anda untuk melanjutkan booking pendakian</p>

                <!-- Form login -->
                <form action="backend/login.php" method="POST" class="auth-form">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                            <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                        </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                </form>

                <p class="auth-link">
                    Belum punya akun?
                    <a href="register.php">Daftar sekarang</a>
                </p>

                <div class="separator"><span>atau</span></div>

                <button type="button" class="btn btn-google">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                         alt="Google logo" class="google-logo">
                    Masuk dengan Google
                </button>
            </div>
        </div>

        <!-- Bagian kanan: gambar ilustrasi -->
        <div class="auth-image-section">
            <img src="assets/bg-login.jpg" alt="Background Login" class="auth-image">
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

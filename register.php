<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pendaki</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <a href="index.php" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

                <h1>Daftar Sekarang Juga</h1>

                <!-- ✅ Form registrasi -->
                <form action="backend/register.php" method="POST">
                    <div class="input-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                            <i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan nomor HP Anda" required>
                    </div>

                    <button type="submit" name="register" class="btn btn-primary">REGISTER</button>
                </form>

                <p class="auth-link">Sudah punya akun? <a href="login.php">Login</a></p>
            </div>
        </div>

        <div class="auth-image-section"></div>
    </div>

    <script>
        // 👁 Toggle password visibility
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>

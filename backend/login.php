<?php
session_start();
include 'koneksi.php'; // Pastikan path ini benar

// Periksa apakah form sudah dikirim
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input dasar (opsional tapi disarankan)
    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = 'Email dan password tidak boleh kosong!';
        header('Location: ../login.php');
        exit;
    }

    // Gunakan prepared statements untuk keamanan
    $stmt = $conn->prepare("SELECT user_id, nama, email, password, role FROM users WHERE email = ?");
    if ($stmt === false) {
        // Gagal mempersiapkan statement (cek error koneksi atau SQL)
        // Sebaiknya log error ini daripada menampilkannya ke pengguna
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        $_SESSION['login_error'] = 'Terjadi kesalahan pada sistem. Coba lagi nanti.';
        header('Location: ../login.php');
        exit;
    }

    // Bind parameter email ke statement
    $stmt->bind_param("s", $email); // "s" untuk string

    // Eksekusi statement
    if (!$stmt->execute()) {
        // Gagal eksekusi
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        $_SESSION['login_error'] = 'Terjadi kesalahan saat login. Coba lagi nanti.';
        header('Location: ../login.php');
        $stmt->close();
        exit;
    }

    // Ambil hasil query
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Email ditemukan, ambil data pengguna
        $data = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Password cocok - Login berhasil
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['email'] = $data['email']; // Simpan email juga jika perlu

            // Hapus pesan error lama jika ada
            unset($_SESSION['login_error']);

            // Arahkan sesuai role
            if ($data['role'] == 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../index.php"); // Pengguna biasa ke beranda
            }
            $stmt->close(); // Tutup statement sebelum exit
            exit;

        } else {
            // Password salah
            $_SESSION['login_error'] = 'Password yang Anda masukkan salah!';
            header('Location: ../login.php');
            $stmt->close();
            exit;
        }
    } else {
        // Email tidak ditemukan
        $_SESSION['login_error'] = 'Email tidak terdaftar!';
        header('Location: ../login.php');
        $stmt->close();
        exit;
    }

} else {
    // Jika file diakses langsung tanpa mengirim form, redirect ke login
    header("Location: ../login.php");
    exit;
}
?>
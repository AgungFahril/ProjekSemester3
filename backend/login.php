<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek email di database
    $query = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($query && $query->num_rows > 0) {
        $data = $query->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];

            // Arahkan sesuai role
            if ($data['role'] == 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='../login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location='../login.php';</script>";
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>

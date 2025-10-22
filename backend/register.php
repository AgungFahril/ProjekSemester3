<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp = $_POST['no_hp'];

    // Cek apakah email sudah ada
    $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($check && $check->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar, silakan gunakan email lain.'); window.location='../register.php';</script>";
        exit;
    }

    // Simpan data ke database
    $sql = "INSERT INTO users (nama, email, password, no_hp, role)
            VALUES ('$nama', '$email', '$password', '$no_hp', 'pendaki')";
    
    if ($conn->query($sql)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='../login.php';</script>";
    } else {
        echo "<script>alert('Gagal registrasi: " . addslashes($conn->error) . "'); window.location='../register.php';</script>";
    }
} else {
    header("Location: ../register.php");
    exit;
}
?>

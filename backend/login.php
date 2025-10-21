<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($query->num_rows > 0) {
        $data = $query->fetch_assoc();
        if (password_verify($password, $data['password'])) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] == 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../index.html");
            }
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
